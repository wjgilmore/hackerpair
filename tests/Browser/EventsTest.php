<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EventsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {


    $user = factory(User::class)->create();

    $this->browse(function ($browser) use ($user) {

        $browser->loginAs($user);
        $browser
            ->visit("/events/create")
            ->type('name', 'John')
            ->select('category_id', 'Smith')
            ->type('max_attendees', 'Smith')
            ->type('description', 'Smith')
            ->press('.submit')
            ->assertSee('Your account profile has been updated');

        });

    }

}
