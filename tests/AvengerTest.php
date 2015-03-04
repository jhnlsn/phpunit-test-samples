<?php

namespace Tests;

class AvengerTest extends \PHPUnit_Framework_TestCase {

    public function testFind() {

        // Mock the data query response
        $heli = $this->getMockBuilder('\Marvel\Helicarrier')
            ->setMethods(['query'])
            ->getMock();

        // Mock database response
        $heli->method('query')->willReturn(['first_name'=>'Richard', 'last_name'=>'Hendriks', 'company' => 'Pied Piper']);

        // Mock getting the connection
        $avenger = $this->getMockBuilder('\Marvel\Avenger')
            ->setMethods(['getConnection'])
            ->getMock();

        $avenger->method('getConnection')
            ->will($this->returnValue($heli));


        $result = $avenger->find(4);

        $this->assertEquals('Richard', $result['first_name']);
        $this->assertEquals('Hendriks', $result['last_name']);
    }
}