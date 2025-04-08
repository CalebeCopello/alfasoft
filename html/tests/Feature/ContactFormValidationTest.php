<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Contact;

class ContactFormValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_validation_errors_when_creating_invalid_contact() {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $response = $this->from('/contacts/create')->post('/contacts', [
            'name' => 'Joe',
            'contact' => '1234',
            'email' => 'not-a-valid-mail',
        ]);
        $response->assertSessionHasErrors(['name', 'contact', 'email']);
    }

    public function test_validation_errors_when_updating_invalid_contact() {
        $user = User::factory()->create();
        $this->actingAs($user);
        $contact = Contact::factory()->create();

        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'Ian',
            'contact' => 'abc',
            'email' => 'bademail.com',
        ]);
        $response->assertSessionHasErrors(['name', 'contact', 'email']);
    }
}
