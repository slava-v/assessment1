<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/7/18
 * Time: 8:25 PM
 */

namespace Tests\Functional;


class NodeControllerTest extends BaseTestCase
{
    public function testGetOneNode_Success()
    {
        $response = $this->runApp(self::REQUEST_GET, '/node/123');

        $this->assertEquals(200, $response->getStatusCode());
    }
}