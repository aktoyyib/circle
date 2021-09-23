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
}
