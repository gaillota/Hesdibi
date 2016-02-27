<?php


namespace AG\ApiBundle\Controller;


use AG\ApiBundle\Form\EmailType;
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
     * Récupérer les informations du fichier correspondant à l'id $id
     *
     * @ApiDoc(
     *     section="Fichiers",
     *     description="Récupérer un fichier",
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
    public function getFilesAction($id)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->find($id);

        return $file;
    }

    /**
     * Récupérer les données du fichier correspondant à l'id $id
     *
     * @ApiDoc(
     *     section="Fichiers",
     *     description="Récupérer les données d'un fichier",
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
    public function getFilesDataAction($id)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->find($id);

        $response = new Response();
        $response->headers->set('Content-Type', $file->getMimeType());
        $response->headers->set('Content-Disposition', 'inline; filename="'.$file->getName().'"');
        $response->setContent(file_get_contents($file->getPath()));

        return $response;
    }

    /**
     * Envoyer par e-mail le fichier correspondant à l'id $id
     *
     * @ApiDoc(
     *     section="Fichiers",
     *     description="Envoyer un fichier par e-mail",
     *     requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="ID du fichier"
     *          }
     *     },
     *     parameters={
     *          {
     *              "name"="email",
     *              "dataType"="string",
     *              "required"=true,
     *              "description"="Adresse e-mail du destinataire"
     *          },
     *          {
     *              "name"="subject",
     *              "dataType"="string",
     *              "required"=false,
     *              "description"="Sujet de l'e-mail"
     *          }
     *     }
     * )
     */
    public function getFilesEmailAction($id)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->find($id);

        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $form = $this->createForm(new EmailType());
        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $mg = new Mailgun($this->container->getParameter('mailgun_api_key'));
            $domain = $this->container->getParameter('domain_name');

            $message = array(
                'from'      => 'no-reply@antoine-gaillot.com',
                'to'        => $form->get('email')->getData(),
                'subject'   => $form->get('subject')->getData(),
                'html'      => $this->renderView(
                    'AGVaultBundle:Mail:email.html.twig',
                    array(
                        'email' => $form->get('email')->getData(),
                        'file' => $file,
                    )
                )
            );

            $mg->sendMessage($domain, $message, array(
                'attachment' => array($file->getPath())
            ));

            $result = $mg->get("$domain/log", array(
                    'limit' => 1,
                    'skip'  => 0)
            );

            $response = array();

            if ($result->http_response_code == 200) {
                $sendToArray = $file->getSendTo();

                $sendTo = $form->get('email')->getData();
                $sendAt = new \DateTime();
                $newSending = array($sendTo, $sendAt);
                array_push($sendToArray, $newSending);
                $file->setSendTo($sendToArray);
                $this->em->persist($file);
                $this->em->flush();

                array_push($response, 'E-mail envoyé avec succès !');
            } else {
                array_push($response, 'Erreur lors de l\'envoi de l\'email');
            }

            return new Response($response);
        }

        return View::create($form, 400);
    }
}