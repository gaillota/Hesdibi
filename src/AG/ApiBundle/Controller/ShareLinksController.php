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
     * Get every sharing links
     *
     * @ApiDoc(
     *     section="Sharing Links",
     *     description="Get all the sharing links"
     * )
     */
    public function getLinksAction()
    {
        $links = $this->em->getRepository('AGVaultBundle:ShareLink')->findShareFiles($this->getUser());

        return $links;
    }
}