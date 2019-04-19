<?php

namespace Tests\Feature;
namespace OES;

use Mail;
use OES\User;
use Tests\TestCase;

use OES\Mail\ConfirmYourEmail;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_has_default_username_after_register()
    {
        $this->post('/register',[
            'name'=>'Rajeev Kumar Yadav',
            'email'=>'rky@gmail.com',
            'password'=>'secret'
        ])->assertRedirect();

        $this->assertDatabaseHas('users', ['username'=>str_slug('Rajeev Kumar Yadav')
        
        ]);
    }

    public function test_an_email_is_sent_to_newly_registered_users()
    {
        //$this->withoutExceptionHandling();
        Mail::fake();
        // register new user
        $this->post('/register', [
            'name'=>'Rajeev Kumar Yadav',
            'email'=>'rky@gmail.com',
            'password'=>'secret'
        ])->assertRedirect();
        //assert that a particular email was sent 
        Mail::assertSent(ConfirmYourEmail::class);
    }
}
