<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use RozeeTest\URL;
class URLTest extends TestCase
{
    public function testSluggifyReturnsSluggifiedStringok()
    {
        $originalString = 'This String will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();
        $result = $url->sluggify($originalString);
        
        $this->assertEquals($expectedResult, $result);
    }
     public function testSluggifyReturnsExpectedForStringsContainingNumbers()
    {
        $originalString = 'This1 String2 will3 be 44 sluggified10';
        $expectedResult = 'this1-string2-will3-be-44-sluggified10';

        $url = new URL();

        $result = $url->sluggify($originalString);  
              

        $this->assertEquals($expectedResult, $result);
    }

    public function testSluggifyReturnsExpectedForStringsContainingSpecialCharacters()
    {
        $originalString = 'This! @string#$ %$will ()be "sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();

        $result = $url->sluggify($originalString);
        
        $this->assertEquals($expectedResult, $result);
    }

    public function testSluggifyReturnsExpectedForStringsContainingNonEnglishCharacters()
    {
        $originalString = "Tänk efter nu – förr'n vi föser dig bort";
        $expectedResult = 'tank-efter-nu-forrn-vi-foser-dig-bort';

        $url = new URL();

        $result = $url->sluggify($originalString);
        
        $this->assertEquals($expectedResult, $result);
    }

    public function testSluggifyReturnsExpectedForEmptyStrings()
    {
        $originalString = '';
        $expectedResult = '';

        $url = new URL();

        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    // public function testSluggifyReturnsSluggifiedStringWithArray($originalString, $expectedResult)
    // {
    //     $url = new URL();

    //     $result = $url->sluggify($originalString);

    //     $this->assertEquals($expectedResult, $result);
    // }

  /**
     * @param string $originalString String to be sluggified
     * @param string $expectedResult What we expect our slug result to be
     *
     * @dataProvider providTestSluggifyReturnsSluggifiedString
     */
    public function testSluggifyReturnsSluggifiedString($originalString, $expectedResult)
    {
        $url = new URL();

        $result = $url->sluggify($originalString);


        $this->assertEquals($expectedResult, $result);
    }

    public function providTestSluggifyReturnsSluggifiedString()
    {
        return array(
            array('This string will be sluggified', 'this-string-will-be-sluggified'),
            array('THIS STRING WILL BE SLUGGIFIED', 'this-string-will-be-sluggified'),
            array('This1 string2 will3 be 44 sluggified10', 'this1-string2-will3-be-44-sluggified10'),
            array('This! @string#$ %$will ()be "sluggified', 'this-string-will-be-sluggified'),
            array("Tänk efter nu – förr'n vi föser dig bort", 'tank-efter-nu-forrn-vi-foser-dig-bort'),
            array('', ''),
        );
    }  
	
}