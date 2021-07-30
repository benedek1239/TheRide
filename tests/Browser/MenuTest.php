<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenuTest extends DuskTestCase
{
    // Check if the footer menu is okey
    /** @test */
    public function footerTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Marketive')
                    ->assertSee('Elérhetőségek')
                    ->assertSee('Felhasználási feltételek');
        });
    }

    // Check if the top menu is okey
    /** @test */
    public function headerTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Kezdőlap')
                    ->assertSee('Fuvarok')
                    ->assertSee('Fuvar létrehozása')
                    ->assertSee('Fuvar keresése')
                    ->assertSee('Aktív fuvarjaim')
                    ->assertSee('Előzmények');
        });
    }
}
