<?php


namespace AG\ApiBundle\Controller;


use AG\ApiBundle\Form\EmailType;
use AG\VaultBundle\Entity\ShareLink;
use Doctrine\ORM\EntityManager;
use FOS\RestBundle\View\View;
use Mailgun\Mailgun;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class FilesController extends Controller
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
     * Get the details for the file {id}
     *
     * @ApiDoc(
     *     section="Files",
     *     description="Get a file",
     *     requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="File ID"
     *          }
     *     }
     * )
     */
    public function getFilesAction($id)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->find($id);

        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        return array(
            'file' => $file
        );
    }

    /**
     * Get the data for file {id}
     *
     * @ApiDoc(
     *     section="Files",
     *     description="Get a file's data",
     *     requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="File ID"
     *          }
     *     }
     * )
     */
    public function getFilesPreviewAction($id)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->find($id);

        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $response = new Response();
        $response->headers->set('Content-Type', $file->getMimeType());
        $response->headers->set('Content-Disposition', 'inline; filename="'.$file->getName().'"');
        $response->setContent(file_get_contents($file->getPath()));

        return $response;
    }

    /**
     * Send the file {id} by e-mail
     *
     * @ApiDoc(
     *     section="Files",
     *     description="Send a file by e-mail",
     *     requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="File ID"
     *          }
     *     },
     *     input="AG\ApiBundle\Form\EmailType",
     *     statusCodes={
     *          200="Returned when e-mail successfully sent",
     *          405="Returned when request is not a POST type",
     *          500="Returned when api key is not provided or not allowed"
     *     }
     * )
     */
    public function postFilesEmailAction($id)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->find($id);

        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $form = $this->createForm(new EmailType);
        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $recipient = $form->get('email')->getData();
            $subject = $form->get('subject')->getData();
            $body = $this->renderView('AGVaultBundle:Mail:email.html.twig', array(
                    'email' => $form->get('email')->getData(),
                    'file' => $file,
                )
            );
            $data = array(
                'attachment' => array(
                    $file->getPath()
                )
            );

            $emailWrapper = $this->get('email_wrapper');
            $emailWrapper
                ->setRecipient($recipient)
                ->setSubject($subject)
                ->setBody($body)
                ->setData($data)
            ;

            if ($emailWrapper->send()) {
                $sendToArray = $file->getSendTo();
                $sendAt = new \DateTime();
                $newSending = array($recipient, $sendAt);
                array_push($sendToArray, $newSending);
                $file->setSendTo($sendToArray);
                $this->em->persist($file);
                $this->em->flush();

                array_push($response, 'E-mail successfully sent !');
            } else {
                array_push($response, 'Error while sending the e-mail');
            }

            return new Response($response);
        }

        return View::create($form, 400);
    }



    /**
     * Generate a sharing link for file {id}
     *
     * @ApiDoc(
     *     section="Files",
     *     description="Generate a sharing link",
     *     requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="File ID"
     *          }
     *     }
     * )
     */
    public function postFilesLinkAction($id)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->find($id);

        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $shareLink = new ShareLink();
        $file->addShareLink($shareLink);

        $length = 20;
        $token = bin2hex(openssl_random_pseudo_bytes($length));

        $shareLink->setFile($file)->setToken($token);

        $this->em->persist($shareLink);
        $this->em->flush();

        return array(
            'shareLink' => $shareLink
        );
    }
}