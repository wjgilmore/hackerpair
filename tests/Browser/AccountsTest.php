<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;

class AccountsTest extends DuskTestCase
{

    public function testSeeSuccessFlashMessageWhenValidProfileDataSubmittedForUpdate()
    {

        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {

            $browser->loginAs($user);

            $browser
                ->visit("/accounts/{$user->id}/edit")
                ->type('first_name', 'John')
                ->type('last_name', 'Smith')
                ->press('.submit')
                ->assertSee('Your account profile has been updated');

        });

    }

    public function testFormRequestDisplaysCorrectErrorsWhenRequiredFieldsAreMissing()
    {

        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {

            $browser->loginAs($user);

            $browser
                ->visit("/accounts/{$user->id}/edit")
                ->type('first_name', '')
                ->type('last_name', '')
                ->type('zip', '')
                ->press('.submit')
                ->assertSee('Please provide your first name')
                ->assertSee('Please provide your last name')
                ->assertSee('Please provide your zip code');

        });

    }

}
