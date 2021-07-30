<?php

namespace Tests\Unit;

use App\Box;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    //testing if the web page status is okey
    /** @test */
    public function testPageStatus()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
