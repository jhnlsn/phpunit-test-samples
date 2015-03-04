<?php

namespace Tests;

class AvengerTest extends \PHPUnit_Framework_TestCase {

    public function testFind() {

        // Mock the data query response
        $heli = $this->getMockBuilder('\Marvel\Helicarrier')
            ->setMethods(['query'])
            ->getMock();

        $heli->method('query')->willReturn(['first_name'=>'test']);

        // Mock getting the connection
        $avenger = $this->getMockBuilder('\Marvel\Avenger')
            ->setMethods(['getConnection'])
            ->getMock();

        $avenger->method('getConnection')
            ->will($this->returnValue($heli));


        $result = $avenger->find(4);

        $this->assertEquals('test', $result['first_name']);

    }
}