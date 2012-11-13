<?php
/**
 * Declares IcansAnnotationsAnnotationDemoExtension
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\AnnotationDemoBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class IcansAnnotationsAnnotationDemoExtension extends Extension
{
    /**
     * {@inheritDoc}
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        // $loader->load('services.xml');
    }
}
