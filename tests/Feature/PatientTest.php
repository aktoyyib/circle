<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Patients;
use App\Models\User;
use Auth;

class PatientTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_patients()
    {
        //Given we have patient in the database
        $patient = Patients::factory()->create();


        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        //When user visit the patients page
        $response = $this->get('/patients');
        
        //He should be able to read the patient name
        $response->assertSee($patient->name);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_patient()
    {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a user object
        $patient = Patients::factory()->make();
        //When user submits post request to create patient endpoint
        $this->post('/patients/store',$patient->toArray());
        //It gets stored in the database
        $this->assertEquals(1,Patients::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_patient()
    {
        //Given we have a user object
        $patient = Patients::factory()->make();
        //When unauthenticated user submits post request to create patient endpoint
        // He should be redirected to login page
        $this->post('/patients/store',$patient->toArray())
             ->assertRedirect('/login');
    }
 
}
