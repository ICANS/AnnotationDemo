<?php
/**
 * Declares Message.
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\AnnotationDemoBundle\Document;

use Icans\Annotations\AnnotationDemoBundle\Api\MessageInterface;

use FOS\UserBundle\Model\UserInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MongoDb document holding a message.
 * 
 * @MongoDB\Document
 * @codeCoverageIgnore
 */
class Message implements MessageInterface
{
    /**
     * @MongoDB\Id(strategy="auto")
     * @var \MongoId
     */
    protected $id;

    /**
     * @MongoDB\String
     * @Assert\MinLength(5)
     * @Assert\MaxLength(100)
     *
     * @var string
     */
    protected $message;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Icans\Annotations\UserBundle\Document\User")
     * @var UserInterface
     */
    protected $author;

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setAuthor(UserInterface $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthor()
    {
        return $this->author;
    }
}