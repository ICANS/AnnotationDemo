<?php
/**
 * Declares DemoController
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\AnnotationDemoBundle\Controller;


use Icans\Annotations\AnnotationDemoBundle\Service\MessageService;
use Icans\Annotations\AnnotationDemoBundle\Api\MessageServiceInterface;

use Icans\Annotations\AnnotationDemoBundle\Form\Type\MessageType;
use Icans\Annotations\AnnotationDemoBundle\Document\Message;
use Icans\Annotations\AnnotationDemoBundle\Exception\UnableToStoreMessageException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use JMS\DiExtraBundle\Annotation\Inject;

/**
 * Controller to demonstrate the use of Annotations in Symfony2.
 */
class DemoController extends Controller
{
    /**
     * @Inject("icans.annotations.annotationdemo.messageservice")
     * @var MessageService
     */
    protected $messageService;

//    /**
//     * Constructor.
//     */
//    public function __construct()
//    {
//        $this->messageService = $this->get('icans.annotations.annotationdemo.messageservice');
//    }

    /**
     * Displays the newest 5 messages.
     *
     * @Route("/", name="annotationdemo_viewMessageList")
     * @Template("IcansAnnotationsAnnotationDemoBundle:Demo:viewMessageList.html.twig")
     *
     * @return array
     */
    public function viewMessageListAction()
    {
        $messages = $this->messageService->findAll(5, 0);

        return array('messages' => $messages);
    }

    /**
     * Shows the create new message form.
     *
     * @Secure(roles="ROLE_USER")
     * @Route("/create/", name="annotationdemo_createMessage")
     * @Template()
     *
     * @param Request        $request
     * @param MessageService $messageService
     * @return array
     */
    public function createNewMessageAction(Request $request)
    {
        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $message = $form->getData();
                $message->setAuthor($this->getUser());
                try {
                    $this->messageService->create($message);
                    return $this->redirect(
                        $this->generateUrl('annotationdemo_viewMessageList', array())
                    );
                } catch (UnableToStoreMessageException $storeException) {
                    $this->get('session')->setFlash('unableToStore', $storeException->getMessage());
                }
            }
        }

        return array('form' => $form->createView());
    }
}