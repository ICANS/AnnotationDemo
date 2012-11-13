<?php
/**
 * Declares DemoController
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\AnnotationDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Implements a controller to show the menu.
 */
class MenuController extends Controller
{
    /**
     * Renders the menu
     *
     * @Template()
     *
     * @return array
     */
    public function menuAction()
    {
        $menuEntries = array();

        $user = $this->getUser();
        $isSignedIn = !empty($user);

        $menuEntries[] = $this->generateMenuEntry('Messages', 'annotationdemo_viewMessageList', 'messages');

        if ($isSignedIn) {
            $menuEntries[] = $this->generateMenuEntry('Create Message', 'annotationdemo_createMessage', 'create-message');
            $menuEntries[] = $this->generateMenuEntry('Sign out', 'fos_user_security_logout', 'logout');
        } else {
            $menuEntries[] = $this->generateMenuEntry('Sign in', 'fos_user_security_login', 'login');
            $menuEntries[] = $this->generateMenuEntry('Register', 'fos_user_registration_register', 'register');
        }

        return array(
            'menuEntries' => $menuEntries,
        );
    }

    /**
     * Return a menu entry (currently as array)
     *
     * @param string $name
     * @param string $route
     * @param string|null $id
     *
     * @return array
     */
    private function generateMenuEntry($name, $route = null, $id = null)
    {
        return array(
            'linktext' => $name,
            'url' => (!empty($route)) ? $this->generateUrl($route) : '#',
            'id' => $id
        );
    }
}
