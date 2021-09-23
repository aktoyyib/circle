<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\BloodPressureObservation;
use App\Models\User;
use App\Exports\BpoExport;
use Maatwebsite\Excel\Facades\Excel;

class BpoTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_patients()
    {
        //Given we have bpo in the database
        $bpo = BloodPressureObservation::factory()->create();

        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        //When user visit the bpos page
        $response = $this->get('/bpo');
        
        //He should be able to read the bpo observation
        $response->assertSee($bpo->observation);
    }

    public function test_create_bpo_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/bpo/create');

        $response->assertStatus(200);
    } 
}
