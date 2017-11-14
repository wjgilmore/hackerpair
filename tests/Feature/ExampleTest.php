<?php

namespace Tests\Feature;

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
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testNonexistentEndpointReturns404()
    {
        $response = $this->get('/contact');

        $response->assertStatus(404);
    }

    public function testHomepageContainsProjectName()
    {
        $response = $this->get('/');

        $response->assertSeeText('Laravel');
    }

}
