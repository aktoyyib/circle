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

    /** @test */
    public function authenticated_users_can_create_a_new_bpo()
    {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a user object
        $bpo = BloodPressureObservation::factory()->make();
        //When user submits post request to create bpo endpoint
        $this->post('/bpo/store',$bpo->toArray());
        //It gets stored in the database
        $this->assertEquals(1,BloodPressureObservation::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_bpo()
    {
        //Given we have a user object
        $bpo = BloodPressureObservation::factory()->make();
        //When unauthenticated user submits post request to create bpo endpoint
        // He should be redirected to login page
        $this->post('/bpo/store',$bpo->toArray())
             ->assertRedirect('/login');
    }   

    /**
    * @test
    */
    public function user_can_download_blood_pressure_observation_export() 
    {
        Excel::fake();

        $this->actingAs($this->givenUser())
             ->get('/bpo/export');

        Excel::assertDownloaded('bpo.xlsx', function(BpoExport $export) {
            // Assert that the correct export is downloaded.
            return $export->collection()->contains('#2018-01');
        });
    }
}
