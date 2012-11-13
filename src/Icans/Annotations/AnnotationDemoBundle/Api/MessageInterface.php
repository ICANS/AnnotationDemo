<?php
/**
 * Declares MessageInterface
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */

namespace Icans\Annotations\AnnotationDemoBundle\Api;

use FOS\UserBundle\Model\UserInterface;

/**
 * Interface for messages.
 */
interface MessageInterface
{
    /**
     * Get id of message.
     *
     * @return \MongoId $id
     */
    public function getId();

    /**
     * Set the message payload.
     *
     * @param string $message
     * @return Interface
     */
    public function setMessage($message);

    /**
     * Get message payload.
     *
     * @return string $name
     */
    public function getMessage();

    /**
     * Set Author.
     *
     * @param UserInterface $author
     * @return Interface
     */
    public function setAuthor(UserInterface $author);

    /**
     * Get Author.
     *
     * @return UserInterface
     */
    public function getAuthor();
}
