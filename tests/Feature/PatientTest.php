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

    public function test_create_patient_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/patients/create');

        $response->assertStatus(200);
    }  
 
}
