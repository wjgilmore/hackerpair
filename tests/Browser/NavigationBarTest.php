<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NavigationBarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_location_link_takes_user_to_locations_index()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Locations')
                    ->assertPathIs('/locations');
        });
    }
}
