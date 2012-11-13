<?php
/**
 * Declares MessageService
 *
 * PHP version 5
 *
 * @package   AnnotationDemoBundle
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\AnnotationDemoBundle\Service;

use Icans\Annotations\AnnotationDemoBundle\Api\MessageServiceInterface;
use Icans\Annotations\AnnotationDemoBundle\Api\MessageInterface;
use Icans\Annotations\AnnotationDemoBundle\Exception\UnableToStoreMessageException;

use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\DocumentManager;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\InjectParams;

/**
 * Service to store messages into the MongoDB.
 * @Service("icans.annotations.annotationdemo.messageservice", public=true)
 */
class MessageService implements MessageServiceInterface
{
    /**
     * @var DocumentManager
     */
    protected $documentManager;

    /**
     * Constructor.
     *
     * @param DocumentManager $documentManager
     * @InjectParams({
     *     "documentManager" = @Inject("doctrine.odm.mongodb.document_manager")
     * })
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    /**
     * {@inheritDoc}
     * @codeCoverageIgnore
     */
    public function findAll($limit, $offset)
    {
        $queryBuilder = $this
            ->documentManager
            ->createQueryBuilder('Icans\Annotations\AnnotationDemoBundle\Document\Message')
            ->limit($limit)
            ->skip($offset)
            ->sort('id', 'desc');

        return $queryBuilder->getQuery()->execute()->toArray();
    }

    /**
     * {@inheritDoc}
     */
    public function create(MessageInterface $message)
    {
        try {
            $this->documentManager->persist($message);
            $this->documentManager->flush();
        } catch (MongoDBException $mongoException) {
            throw new UnableToStoreMessageException('Failed to persist message: ' . $mongoException->getMessage());
        }

        return $message;
    }
}