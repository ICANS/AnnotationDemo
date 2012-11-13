<?php
/**
 * Declares UnableToStoreMessageException
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */

namespace Icans\Annotations\AnnotationDemoBundle\Exception;

use Icans\Annotations\AnnotationDemoBundle\Api\AnnotationDemoBundleExceptionInterface;

/**
 * Exception thrown if a message can't be stored.
 */
class UnableToStoreMessageException extends \RuntimeException implements AnnotationDemoBundleExceptionInterface
{

}