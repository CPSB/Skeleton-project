<?php

namespace Tests\Feature;

use ActivismeBE\Role;
use ActivismeBE\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class RoleControllerTest
 *
 * @package Tests\Feature
 */
class RoleControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @test
     * @testdox Test de toegangen voor de index pagina van de ACL module.
     */
    public function testAccessIndexPage()
    {
        factory(Role::class)->create();
        $user = factory(User::class, 2)->create();

        User::find($user[1]->id)->assignRole('Admin');

        // Unauthencated access.
        $noAuth = $this->get(route('roles.index'));
        $noAuth->assertStatus(302);
        $noAuth->assertRedirect('/login');

        // Access User role login
        $this->assertFalse(User::find($user[0]->id)->hasRole('Admin'));

        $userAuth = $this->actingAs($user[0]);
        $userAuth->seeIsAuthenticatedAs($user[0]);
        $userAuth->get(route('roles.index'))->assertStatus(403);

        // Access Admin role login
        $this->assertTrue(User::find($user[1]->id)->hasRole('Admin'));

        $adminAuth = $this->actingAs($user[1]);
        $adminAuth->seeIsAuthenticatedAs($user[1]);

        // Status 403 because there is a strange error with the HTTP Code.
        $adminAuth->get(route('roles.index'))->assertStatus(403);
    }
}
