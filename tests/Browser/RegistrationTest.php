<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    // Check if the register form works correctly and then return to home page with the signed in user
    /** @test */
    public function test_user_register_form()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('hu/register')
                ->type('#name', 'example name')
                ->type('#email-input-field', 'example@example.com')
                ->type('#password-input-field', 'thisisasecret1')
                ->type('#password-confirm-input-field', 'thisisasecret1')
                ->click('#terms-checkbox')
                ->press('#register-btn')
                ->assertPathIs('/hu')
                ->click('#user-icon-desktop')
                ->assertSee('example name');
        });
    }

}
