<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class AccountsTest extends TestCase
{

    use RefreshDatabase;

    public function testIntruderCannotEditAnotherUsersProfile()
    {

        $owner = factory(User::class)->create();
        $intruder = factory(User::class)->create();

        $this->actingAs($intruder)
            ->get("/accounts/{$owner->id}/edit")
            ->assertStatus(403);

    }

    public function testUserCanEditOwnProfile()
    {

        $owner = factory(User::class)->create();

        $this->actingAs($owner)
            ->get("/accounts/{$owner->id}/edit")
            ->assertStatus(200);

    }



}
