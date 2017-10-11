<?php

namespace Tests\Feature;

use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocialAuthencationTest extends TestCase
{
    /**
     * @test
     */
    public function testFacebookAuthencation()
    {
        Socialite::shouldReceive('driver->fields->scopes->user')->with('facebook')->andReturn(true);
    }

    /**
     * @test
     */
    public function testTwitterAuthencation()
    {
        Socialite::shouldReceive('driver->fields->scopes->user')->with('twitter')->andReturn(true);
    }
}
