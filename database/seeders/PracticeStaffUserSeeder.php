<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PracticeStaffUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Nurse', 'Doctor'];

        foreach($roles as $role) 
        {
            //$users = factory(User::class, 35)->create();
            $users = User::factory()->count(35)->create();
            $role = Role::create(['name' => $role]);
     
            $permissions = Permission::pluck('id','id')->all();
       
            $role->syncPermissions($permissions);
         

            foreach($users as $user)
            {
                $user->assignRole([$role->id]); 
            }
        }  
    }
}
