<?php

/**
 * Declares ReflectionController
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\AnnotationDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Controller to show the reflection functions.
 * @ignore
 * @codeCoverageIgnore
 * @see http://php.net/manual/en/book.reflection.php
 */
class ReflectionController extends Controller
{
    /**
     * @var string
     */
    protected $reflectionProperty;

    /**
     * Showing how the Reflection is able to access the Documentation.
     *
     * @Route("/reflection/", name="annotationdemo_reflection")
     * @Template()
     *
     * @return array
     */
    public function reflectionAction()
    {
        $reflectionClass = new \ReflectionClass($this);
        $classDocumentation = $reflectionClass->getDocComment();
        preg_match('/@see\s+(.*)\n/', $classDocumentation, $seeAnnotation);
        
        $reflectedMethod = $reflectionClass->getMethod('reflectionAction');
        $methodDocumentation = $reflectedMethod->getDocComment();
        preg_match('/@Route\(.*\)/', $methodDocumentation, $routeAnnotations);

        $reflectedProperty = $reflectionClass->getProperty('reflectionProperty');
        $propertyDocumentation = $reflectedProperty->getDocComment();
        preg_match('/@var\s+(.*)\n/', $propertyDocumentation, $typeAnnotation);

        return array(
            'classDocumentation' => $classDocumentation,
            'seeAnnotation' => $seeAnnotation[1],
            'methodDocumentation' => $methodDocumentation,
            'routeAnnotation' => $routeAnnotations[0],
            'propertyDocumentation' => $propertyDocumentation,
            'typeAnnotation' => $typeAnnotation[1],
        );
    }
}