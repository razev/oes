<?php

namespace Tests\Feature;
namespace OES;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    use RefreshDatabase;

    public function test_correct_response_after_users_logs_in()
    {
        $user = factory(User::class)->create();
        $this->postJson('/login', ['email'=>$user->email, 
        'password'=>'secret'])->assertStatus(200)
        // ->assertJson(['message' =>'This credential do not match our records.']);
        ->assertJson(array('status'=>'ok'))->assertSessionHas('success','Successfully Logged in.');
    }
    public function test_a_user_recieves_correct_message_when_passing_in_wrong_creditionals()
    {
        $user = factory(User::class)->create();
        $this->postJson('/login', ['email'=>$user->email, 
        'password'=>'wrong-password'])->assertStatus(422)
        // ->assertJson(['message' =>'This credential do not match our records.']);
        ->assertJson( array (
              'message' => 'This credential do not match our records.',
             'message' => 'These credentials do not match our records.',
        ));
    }
}
