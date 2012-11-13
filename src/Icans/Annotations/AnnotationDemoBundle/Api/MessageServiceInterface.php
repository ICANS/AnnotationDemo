<?php
/**
 * Declares MessageServiceInterface
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */

namespace Icans\Annotations\AnnotationDemoBundle\Api;

use Icans\Annotations\AnnotationDemoBundle\Api\MessageInterface;
use Icans\Annotations\AnnotationDemoBundle\Exception\UnableToStoreMessageException;

/**
 * Interface for the message service.
 */
interface MessageServiceInterface
{
    /**
     * Returns an array of messages.
     *
     * @param integer $limit  The limit for the query.
     * @param integer $offset The offset for the query.
     *
     * @return array
     */
    public function findAll($limit, $offset);

    /**
     * Stores a new message in the database.
     * 
     * @param MessageInterface $message
     *
     * @return MessageInterface The stored message.
     *
     * @throws UnableToStoreMessageException
     */
    public function create(MessageInterface $message);
}
