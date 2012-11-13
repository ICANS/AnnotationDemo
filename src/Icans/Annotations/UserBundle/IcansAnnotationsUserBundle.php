<?php
/**
 * Declares IcansAnnotationsUserBundle.
 *
 * @package   UserBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Bundle class for the annotation demo user bundle.
 */
class IcansAnnotationsUserBundle extends Bundle
{
    /**
     * Define the FOSUserBundle as parent to be able to overwrite.
     *
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}