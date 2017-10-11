<?php

namespace Tests\Feature;

use ActivismeBE\Notifications\ContactMessage;
use ActivismeBE\Role;
use ActivismeBE\User;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractFrontTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @test
     */
    public function testFrontEndIndexForm()
    {
        $this->get(route('contact.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function testStoreFrontEndContactFormValidationErrors()
    {
        factory(Role::class)->create(['name' => 'Admin']);

        $this->post(route('contact.store'), [])
            ->assertStatus(302)
            ->assertSessionHasErrors();
    }

    /**
     * @test
     */
    public function testStoreFrontEndContactFormNValidationErrors()
    {
        Notification::fake();

        factory(Role::class)->create(['name' => 'Admin']);
        $user = factory(User::class)->create();

        User::find($user->id)->assignRole('Admin');

        $input = [
            'first_name' => 'first name.',
            'last_name'  => 'last name',
            'email'      => 'name@domain.tld',
            'subject'    => 'Bericht onderwerp.',
            'message'    => 'Ik ben een bericht.',
        ];

        $this->post(route('contact.store'), $input)
            ->assertSessionHas(['flash_notification.0.message' => trans('contact.contact-store')])
            ->assertStatus(302);

        Notification::assertSentTo([$user], ContactMessage::class);


        $this->assertDatabaseHas('contacts', $input);
    }
}
