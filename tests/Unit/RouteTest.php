<?php

namespace Tests\Unit;

use App\Route;
use Tests\TestCase;

class RouteTest extends TestCase
{
    
    // testing if the route object constructed correctly
    /** @test */
    public function testBoxContents()
    {
        $route = new Route(['Csíkszereda'], 1);
        $this->assertTrue($route->hasCity('Csíkszereda'));
        $this->assertFalse($route->hasCity('Temesvár'));
    }


    //Testing if the route takeOneCity function works correctly
    /** @test */
    public function testTakeOneFromTheBox()
    {
        $route = new Route(['Csíkszereda'], 1);
        $this->assertEquals('Csíkszereda', $route->takeOneCity());

        // Null, now the route is empty
        $this->assertNull($route->takeOneCity());
    }
    

    //Testing if the route citiesMergeTogether function works correctly
    /** @test */
    public function testCitiesMergeTogether()
    {
        $route1 = new Route(['Csíkszereda', 'Székelyudvarhely'], 1);
        $route2 = new Route(['Szentegyáza', 'Lövéte', 'Almás'], 2);

        $route1->citiesMergeTogether($route2);

        //check if the old cities stayed on the route
        $this->assertContains('Csíkszereda', $route1->getCities());

        //Check if the new cities are on the route
        $this->assertContains('Szentegyáza', $route1->getCities());
    }


    //Testing if the route startWithALetter function works correctly
    /** @test */
    public function testStartsWithALetter()
    {
        $route = new Route(['Csíkszereda', 'Székelyudvarhely', 'Szentegyáza', 'Lövéte', 'Almás'], 1);

        $results = $route->startsWith('S');

        $this->assertCount(2, $results);
        $this->assertContains('Székelyudvarhely', $results);
        $this->assertContains('Szentegyáza', $results);

        // Empty array if passed even
        $this->assertEmpty($route->startsWith('U'));
    }

}
