<?php

namespace Tests\Feature;

use ActivismeBE\Role;
use ActivismeBE\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AccountSettingsTest
 *
 * @package Tests\Feature
 */
class AccountSettingsTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @test
     * @testdox Er kan geen gast gebruiker de account configuratie pagina benaderen.
     */
    public function testIndexViewNotAuthorized()
    {
        $this->get(route('settings.index'))
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * @test
     * @testdox De aangemelde gebruiker kan de account configuratie pagina bekijken.
     */
    public function testIndexViewAuthorized()
    {
        factory(Role::class)->create(['name' => 'Admin']);
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('settings.index'))
            ->assertStatus(200);
    }

    /**
     * @test
     * @testdox Een gast gebruiker kan geen account informatie aanpassen.
     */
    public function testUpdateInfoNotAuthorized()
    {
        $input = ['name' => 'Jhon Doe', 'email' => 'jhon.doe@example.tld'];

        $this->post(route('settings.info'), $input)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * @test
     * @testdox De gebruiker kan zijn account info aanpassen.
     */
    public function testUpdateInfoSuccess()
    {
        factory(Role::class)->create(['name' => 'Admin']);
        $user = factory(User::class)->create();

        $input = ['name' => 'Jhon Doe', 'email' => 'jhon.doe@example.tld'];

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('settings.info'), $input)
            ->assertSessionHas(['flash_notification.0.message' => trans('profile-settings.flash-info')])
            ->assertStatus(302);

        $this->assertDatabaseMissing('users', ['name' => $user->name, 'email' => $user->email]);
        $this->assertDatabaseHas('users', $input);
    }

    /**
     * @test
     * @testdox Er zijn validatie fouten in de account info update. (flash session test)
     */
    public function testUpdateWithValidationErrors()
    {
        factory(Role::class)->create(['name' => 'Admin']);
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('settings.info'), [])
            ->assertStatus(302)
            ->assertSessionHasErrors();
    }

    /**
     * @test
     * @test Een gast gebruiker kan geen account wachtwoord wijziging doorvoeren.
     */
    public function testUpdateSecurityNotAuthorized()
    {
        $input = ['password' => 'newPassword', 'password_confirmation' => 'newPassword'];

        $this->post(route('settings.security'), $input)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * @test
     * @testdox De ingeloged gebruiker kan zijn wachtwoord aanpassen.
     */
    public function testUpdateSecuritySuccess()
    {
        factory(Role::class)->create();
        $user  = factory(User::class)->create();

        $input = ['password' => 'NewPassword', 'password_confirmation' => 'NewPassword'];

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('settings.security'), $input)
            ->assertStatus(302)
            ->assertSessionHas(['flash_notification.0.message' => trans('profile-settings.flash-password')]);
    }

    /**
     * @test
     * @testdox Er zijn validatie fouten gewonden voor de wachtwoord wijziging (flash session test)
     */
    public function testUpdateSecurityValidationErrors()
    {
        factory(Role::class)->create();
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('settings.security'), [])
            ->assertStatus(302)
            ->assertSessionHasErrors();
    }
}
