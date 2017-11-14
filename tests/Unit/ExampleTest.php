<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testSomeValueIsFalse()
    {
        $this->assertFalse(false);
    }

    public function testUserFullNameIsJasonGilmore()
    {
        $fullName = "Jason Gilmore";
        $this->assertEquals("Jason Gilmore", $fullName);
    }

    public function testUserHasFavoritedFiveEvents()
    {
        $favorites = [45, 12, 676, 88, 15];
        $this->assertCount(5, $favorites);
    }

}
