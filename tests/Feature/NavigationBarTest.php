<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NavigationBarTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testContainsRequiredLinks()
    {
        $this->visit('/')
            ->click('Locations')
            ->seePageIs('/locations');
    }
}
