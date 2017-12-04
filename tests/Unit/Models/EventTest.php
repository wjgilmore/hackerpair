<?php

namespace Tests\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{

    use RefreshDatabase;

    public function testEventDateTimeFieldIsACarbonObject()
    {
        $event = factory(\App\Event::class)->make();
        $this->assertTrue(is_a($event->started_at, 'Illuminate\Support\Carbon'));
    }

    public function testEventNameCapitalizationIsCorrect()
    {

        $event = factory(\App\Event::class)->states('incorrect_capitalization')->make();

        $this->assertEquals($event->name, "Have Fun with the Raspberry Pi");

    }

}
