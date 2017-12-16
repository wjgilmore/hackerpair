<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Category;
use App\State;
use App\User;

use Tests\Browser\Components\DatePicker;

class EventsTest extends DuskTestCase
{

    use DatabaseMigrations;

    public function setup()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();

    }

    public function testCanPostNewEvent()
    {


        $this->browse(function ($browser) {

            $category = factory(Category::class)->create();
            $state = factory(State::class)->create();

            $browser->loginAs($this->user);
            $browser
                ->visit("/users/{$this->user->id}/hosted/create")
                ->type('name', 'PHP Hacking and Pizza')
                ->select('category_id', $category->id)
                ->select('max_attendees', '3')
                ->click('@date-picker-component')
                ->click('.day:last-of-type')
                ->select('start_time', '18:00pm')
                ->type('description', 'This is a description')
                ->type('venue', 'The Pizza Cafe')
                ->type('street', '1234 Jump Street')
                ->type('city', 'Dublin')
                ->select('state_id', $state->id)
                ->type('zip', '43016')
                ->check('published')
                ->press('.submit')
                ->assertSee('Event created');

            });

    }

    public function testEventNameIsRequired()
    {


        $this->browse(function ($browser) {

            $category = factory(Category::class)->create();
            $state = factory(State::class)->create();

            $browser->loginAs($this->user);
            $browser
                ->visit("/users/{$this->user->id}/hosted/create")
                ->select('category_id', $category->id)
                ->select('max_attendees', '3')
                ->click('@date-picker-component')
                ->click('.day:last-of-type')
                ->select('start_time', '18:00pm')
                ->type('description', 'This is a description')
                ->type('venue', 'The Pizza Cafe')
                ->type('street', '1234 Jump Street')
                ->type('city', 'Dublin')
                ->select('state_id', $state->id)
                ->type('zip', '43016')
                ->check('published')
                ->press('.submit')
                ->assertSee('Please provide an event name');

        });

    }

}
