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
    public function t1estGetOneNode_Success()
    {

        $nodeData = [
            'id' => '',
            'metaData' => [],
            'leafs' => []
        ];

        $addResponse = $this->runApp(self::REQUEST_POST, '/node', $nodeData);
        $addResponseBody = $addResponse->getBody();
        $nodeData2 = json_decode($addResponseBody);

        $newId = $nodeData2->data->newId;

        $getResponse = $this->runApp(self::REQUEST_GET, '/node/' . $newId);

        $this->assertEquals(200, $getResponse->getStatusCode());
    }

    public function t1estGetOneNode_Failure()
    {
        $response = $this->runApp(self::REQUEST_GET, '/node/012345678');

        $this->assertEquals(404, $response->getStatusCode());
    }
}