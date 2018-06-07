<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/7/18
 * Time: 8:03 PM
 */

namespace Tests\Functional;


use AssessmentApp\Entities\Node;
use AssessmentApp\Repositories\Interfaces\INodeRepository;
use AssessmentApp\Services\NodeService;
use AutoMapperPlus\AutoMapperInterface;
use PHPUnit\Framework\TestCase;

class NodeServiceTest extends TestCase
{
    function testGetNode_Successful()
    {
        // Arrange
        $node = new Node();

        $repositoryMock = $this->createMock(INodeRepository::class);
        $repositoryMock
            ->expects($this->once())
            ->method('getById')
            ->willReturn($node);

        $autoMapperMock = $this->createMock(AutoMapperInterface::class);

        $nodeService = new NodeService($repositoryMock, $autoMapperMock);

        //Act
        $nodeReturned = $nodeService->getNode($node->getId());

        //Assert
        $this->assertEquals($node->getId(), $nodeReturned->getId());
        $this->assertInstanceOf(Node::class, $nodeReturned);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    function testGetNode_ThrowsException()
    {
        // Arrange
        $node = new Node();

        $repositoryMock = $this->createMock(INodeRepository::class);
        $autoMapperMock = $this->createMock(AutoMapperInterface::class);

        $nodeService = new NodeService($repositoryMock, $autoMapperMock);

        //Act
        $nodeReturned = $nodeService->getNode('');

        //Assert
    }
}