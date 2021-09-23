<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UserTest extends TestCase
{
    use DatabaseMigrations; 

    public function test_create_user_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/users/create');

        $response->assertStatus(200);
    } 

    /** @test */
    public function a_user_can_read_all_the_staff_users()
    {
        //Given we have user in the database 
        $user  = User::factory()->create();

        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        //When user visit the users page
        $response = $this->get('/users');
        
        //He should be able to read the user
        $response->assertSee($user->firstname);
    } 

    /** @test */
    public function authenticated_users_can_create_a_new_staff()
    {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a user object
        $user = User::factory()->make();
        //When user submits post request to create user endpoint
        $this->post('/users/store',$user->toArray());
        //It gets stored in the database
        $this->assertEquals(1,User::all()->count());
    }
}
