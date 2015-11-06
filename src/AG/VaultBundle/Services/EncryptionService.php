<?php


namespace AG\VaultBundle\Services;


use AG\UserBundle\Entity\User;
use AG\VaultBundle\Entity\File;
use Sinner\Phpseclib\Crypt\Crypt_AES;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class EncryptionService
{
    const FILE_SALT_SIZE = 8; // Salt's size (8 bytes = 64 bits)

    const IV_SIZE = 16; // 128 bits

    const ENCRYPTION_KEY_LENGTH = 32; // AES-256 => 256 bits key size

    const PBKDF2_ITERATIONS = 1000; // Number of iterations for the PBKDF2 generated key

    const PBKDF2_SIZE = 32; // 256 bits (2x128 bits for 1-Encryption key and 2-Password Validator)

    const AES_256_CBC = 'aes-256-cbc'; // AES-256

    /**
     * @var User $user
     *
     * Current user
     */
    private $user;

    public function __construct(TokenStorage $tokenStorage)
    {
        $this->user = $tokenStorage->getToken()->getUser();
    }

    public function setupEncryptionRequirements($password)
    {
        $key = $this->generateFileEncryptionKey();
        $iv = $this->generateIV();

        $passwordValidatorAndKey = $this->getPasswordValidator($password, $this->user->getSalt());
        $keyEncryption = $passwordValidatorAndKey['encryptionKey'];
        $passwordValidator = $passwordValidatorAndKey['passwordValidator'];

        $cipher = new Crypt_AES(CRYPT_AES_MODE_CBC);
        $cipher->setKey($keyEncryption);
        $cipher->setIV($iv);

        $encryptedKey = $cipher->encrypt($key);

        $this->user
            ->setEncryptedKey($encryptedKey)
            ->setIv($iv)
            ->setPasswordValidator($passwordValidator)
        ;

        return $this->user;
    }

    /**
     * @param File $file
     * @param $password
     * @return File $file
     *
     * Encrypt file
     */
    public function encrypt(File $file, $password)
    {
        $fileEncryptionKey = $this->generateFileEncryptionKey();
        $fileData = file_get_contents($file->getPath());
        // Encrypt file data
        $fileDataEncrypted = $this->encryptData($fileData, $fileEncryptionKey);

        $passwordValidator = $this->getPasswordValidator($password, $this->user->getSalt());
        $ivEncryptionKey = null == $file->getIvEncryptionKey() ? $this->generateIV() : $file->getIvEncryptionKey();
        // Encrypt encryption key
        $encryptionKeyEncrypted = $this->encryptEncryptionKey($passwordValidator['encryptionKey'], $fileEncryptionKey, $ivEncryptionKey);


        $oldFile = $file->getPath();

        $filename = basename($file->getPath()).".aes";
        $target = dirname($file->getPath()) . "/" . $filename;

        $fileEncrypted = fopen($target, "wb");
        fwrite($fileEncrypted, $fileDataEncrypted);
        fclose($fileEncrypted);

        $file
            ->setSalt($salt)
            ->setPasswordValidator($passwordValidator['passwordValidator'])
            ->setEncryptedKey($encryptionKeyEncrypted)
            ->setIvEncryptionKey($ivEncryptionKey)
            ->setIsEncrypted(true)
            ->setDataEncrypted($fileDataEncrypted)
        ;

        @unlink($oldFile);

        return $file;
    }

//    /**
//     * @param File $file
//     * @param $password
//     * @return string
//     *
//     * Decrypt file
//     */
//    public function decrypt(File $file, $password)
//    {
//        $passwordValidator = $this->getPasswordValidator($password, $file->getSalt());
//
//        if ($file->getPasswordValidator() != $passwordValidator['passwordValidator'])
//            throw new AccessDeniedException("Mauvais mot de passe pour le décryptage de fichier");
//
//        $fileEncryptionKey = $this->decryptFileEncryptionKey($passwordValidator['encryptionKey'], $file->getEncryptedKey(), $file->getIvEncryptionKey());
//        return $this->decryptData($fileEncryptionKey, file_get_contents($file->getFile()));
//    }

    /**
     * @param $file
     * @param $encryptionKey
     *
     * Encrypt data with encryption key
     */
    public function encryptData($data, $encryptionKey)
    {
//        $encrypter = new Crypt_AES();
//        $encrypter->setKey($encryptionKey);
//        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::AES_256_CBC));
        return openssl_encrypt($data, self::AES_256_CBC, $encryptionKey, false);
    }

    /**
     * @param $encryptionKey
     * @param $encryptedData
     * @return string
     *
     * Decrypt data with encryption key
     */
    public function decryptData($encryptedData, $encryptionKey)
    {
//        $encrypter = new Crypt_AES();
//        $encrypter->setKey($encryptionKey);
        return openssl_decrypt($encryptedData, self::AES_256_CBC, $encryptionKey, false);
    }

//    /**
//     * @return string
//     */
//    public function generateFileSalt()
//    {
//        $authorizedChars = "0123456789abcdefghijklmnopqrstuvwxyz";
//        $salt = "";
//        for ($i = 0; $i < 31; $i++) {
//            $salt.= $authorizedChars[rand(0, strlen($authorizedChars) - 1)];
//        }
//
//        return $salt;
////        return mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
//    }

    /**
     * @return string
     *
     * Generate a random encryption key for file encryption
     */
    public function generateFileEncryptionKey()
    {
        $isCryptoStrong = false;
        do {
            $key = openssl_random_pseudo_bytes(self::ENCRYPTION_KEY_LENGTH, $isCryptoStrong);
        } while(!$isCryptoStrong);

        return $key;
    }

    /**
     * @return string
     *
     * Generate IV for AES Encryption of the file's encryption key
     */
    public function generateIV()
    {
        $length = openssl_cipher_iv_length(self::AES_256_CBC);
        $isCryptoStrong = false;
        do {
            $iv = openssl_random_pseudo_bytes($length, $isCryptoStrong);
        } while(!$isCryptoStrong);

        return $iv;
//        return bin2hex(mcrypt_create_iv(self::IV_SIZE, MCRYPT_RAND));
    }

    /**
     * @param $password
     * @param $salt
     * @return mixed
     *
     * Generate a key base on a password and a salt using the PBKDF2 algorithm
     */
    public function getPasswordValidator($password, $salt)
    {
        $passwordValidator = hash_pbkdf2("sha256", $password, $salt, self::PBKDF2_ITERATIONS, 0, false);
        return $this->splitStringInHalf($passwordValidator);
    }

//    /**
//     * @param $key
//     * @param $fileEncryptionKey
//     * @param $iv
//     * @return string
//     *
//     * Encryption of the 128 bits file's encryption key
//     */
//    public function encryptEncryptionKey($key, $fileEncryptionKey, $iv)
//    {
////        $encrypter = new Crypt_AES();
////        $encrypter->setKey($key);
////        $encrypter->setIV($iv);
//        return openssl_encrypt($fileEncryptionKey, self::AES_256_CBC, $key, false, $iv);
////        return $encrypter->encrypt($fileEncryptionKey);
//    }

//    /**
//     * @param $key
//     * @param $fileEncryptedKey
//     * @param $iv
//     * @return string
//     *
//     * Decryption of the file's encryption file
//     */
//    public function decryptFileEncryptionKey($key, $fileEncryptedKey, $iv)
//    {
////        $encrypter = new Crypt_AES();
////        $encrypter->setKey($key);
////        $encrypter->setIV($iv);
//        return openssl_decrypt($fileEncryptedKey, self::AES_256_CBC, $key, false, $iv);
////        return $encrypter->decrypt($fileEncryptedKey);
//    }

    /**
     * @param $string
     * @return array
     *
     * Split input string in half
     */
    public function splitStringInHalf($string)
    {
        $size = strlen($string) / 2;

        return array(
            'encryptionKey' => substr($string, 0, $size), //First half of the string
            'passwordValidator' => substr($string, $size), //Second half of the string
        );
    }
}