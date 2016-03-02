<?php

namespace AG\VaultBundle\Controller;


use AG\VaultBundle\Entity\ShareLink;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class ShareLinkController extends Controller
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var Request
     */
    private $request;

    /**
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function allAction()
    {
        $listShareLinks = $this->em->getRepository('AGVaultBundle:ShareLink')->findShareFiles($this->getUser());

        return array(
            'listShareLinks' => $listShareLinks,
        );
    }

    /**
     * @param ShareLink $shareLink
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function removeAction(ShareLink $shareLink)
    {
        if ($shareLink->getFile()->getOwner() !== $this->getUser())
            throw new AccessDeniedException("You cannot remove this link, the file attached does not belong to you.");

        $form = $this->createFormBuilder()->getForm();

        if ($form->handleRequest($this->request)->isValid()) {
            $this->em->remove($shareLink);
            $this->em->flush();

            $this->addFlash('danger', '<i class="fa fa-trash"></i> Sharing link removed !');

            return $this->redirectToRoute('ag_vault_link_all');
        }

        return array(
            'file' => $shareLink->getFile(),
            'form' => $form->createView(),
        );
    }

}