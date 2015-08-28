<?php


class PracticeTest extends TestCase
{
    public function testHelloWorld()
    {
        $greeting = 'Hello, World.';
        $val=null;

        $names=['Rafay','Haseeb','Danish'];

        $family=[ 'parents'=>'Pakistan',
                  'child'=>['Karchi','Lahore'] ];

        $age=23;

        //$this->assertContains('Rafay', $names);
        //$this->assertArrayHasKey('child', $family);
         $this->assertInternalType('integer', $age);
    }    

    public function testFetchesItemsInArrayUntilKey()
    {
//        // Arrange
//         $names = ['Taylor', 'Dayle', 'Matthew', 'Shawn', 'Neil'];

//         // Act
// //        $result = array_until('Matthew', $names);
//         // Assert
//         $expected = ['Taylor', 'Dayle'];
//         $this->assertEquals($expected, 'Rafay');
    }

    public function testDelteUserAnchor()
    {

        // $actual = link_to('http://localhost/rozee/public/blogs/blogbyuser/27', 'Ok');
        // $expect = "<a href=http://localhost/rozee/public/blogs/blogbyuser/27>Ok</a>";
    


        // $this->assertEquals($expect, $actual);
    }


}


