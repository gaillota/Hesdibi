<?php


namespace AG\ApiBundle\Controller;


use AG\VaultBundle\Entity\ShareLink;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ShareLinksController extends Controller
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * Générer un lien de partage pour la fichier correspondant à l'id $id
     *
     * @ApiDoc(
     *     section="Liens de partage",
     *     description="Générer lien de partage",
     *     requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="ID du fichier"
     *          }
     *     }
     * )
     */
    public function postLinksAction($id)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->find($id);

        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $shareLink = new ShareLink();
        $file->addShareLink($shareLink);

        $length = 20;
        $token = bin2hex(openssl_random_pseudo_bytes($length));

        $shareLink->setFile($file)->setToken($token);

        $this->em->persist($shareLink);
        $this->em->flush();

        return new JsonResponse(array(
            'response' => 1,
            'route' => $this->generateUrl('ag_vault_file_show', array('token' => $shareLink->getToken()), UrlGeneratorInterface::ABSOLUTE_URL),
        ));
    }
}