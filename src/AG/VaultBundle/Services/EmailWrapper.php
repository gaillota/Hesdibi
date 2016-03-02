<?php


namespace AG\VaultBundle\Services;

use Mailgun\Mailgun;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EmailWrapper
{
    /**
     * @var string
     *
     * Mailgun API Key
     */
    private $apiKey;

    /**
     * @var string
     *
     * Sender domain name
     */
    private $domainName;

    /**
     * @var string
     *
     * The recipient email address
     */
    private $recipient;

    /**
     * @var string
     *
     * The email subject
     */
    private $subject;

    /**
     * @var string
     *
     * The email body
     */
    private $body;

    /**
     * @var string
     *
     * The sender local part
     */
    private $localpart;

    /**
     * @var array
     *
     * The optional data
     */
    private $data;


    public function __construct($mailgun_api_key, $domain_name)
    {
        $this->apiKey       = $mailgun_api_key;
        $this->domainName   = $domain_name;
        $this->localpart    = 'no-reply';
        $this->data         = array();
    }



    /**
     * @return bool
     * @throws \Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters
     */
    public function send()
    {
        $mailgun = new Mailgun($this->apiKey);

        $message = array(
            'from'      => $this->localpart . '@' . $this->domainName,
            'to'        => $this->recipient,
            'subject'   => $this->subject,
            'html'      => $this->body
        );

        $mailgun->sendMessage($this->domainName, $message, $this->data);

        $result = $mailgun->get("$this->domainName/log", array(
                'limit' => 1,
                'skip'  => 0
            )
        );

        return $result->http_response_code == 200;
    }

    /**
     * @param mixed $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param string $localpart
     */
    public function setLocalpart($localpart)
    {
        $this->localpart = $localpart;
        return $this;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}