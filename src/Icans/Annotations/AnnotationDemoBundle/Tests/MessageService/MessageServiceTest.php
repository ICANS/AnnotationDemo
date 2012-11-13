<?php
/**
 * Declares MessageServiceTest
 *
 * @author    Thorsten 'stepo' Hallwas
 * @copyright 2012 ICANS GmbH
 */
namespace Icans\Annotations\AnnotationDemoBundle\Service;

use Doctrine\ODM\MongoDB\MongoDBException;

/**
 * Tests class for the message service.
 */
class MessageServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $documentManagerMock;

    /**
     * @var MessageService
     */
    protected $service;

    /**
     * Initialize
     */
    public function setUp()
    {
        $this->documentManagerMock = $this
            ->getMockBuilder('\Doctrine\ODM\MongoDB\DocumentManager')
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->getMock();
        $this->service = new MessageService($this->documentManagerMock);
    }

    /**
     * Tests that an exception is thrown if the document manager fails.
     *
     * @test
     * @expectedException \Icans\Annotations\AnnotationDemoBundle\Exception\UnableToStoreMessageException
     */
    public function createException()
    {
        $messageMock = $this->getMock('\Icans\Annotations\AnnotationDemoBundle\Api\MessageInterface');

        $this->documentManagerMock
            ->expects($this->once())
            ->method('persist')
            ->will($this->throwException(new MongoDBException));

        $this->service->create($messageMock);
    }

    /**
     * Tests that the document manager is called correctly.
     */
    public function testCreateCallsDocumentManager()
    {
        $messageMock = $this->getMock('\Icans\Annotations\AnnotationDemoBundle\Api\MessageInterface');

        $this->documentManagerMock
            ->expects($this->once())
            ->method('persist')
            ->with($messageMock);
        $this->documentManagerMock
            ->expects($this->once())
            ->method('flush');

        $this->service->create($messageMock);
    }
}