<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'Akande',
            'lastname' => 'Toyyib',
            'email' => 'tizzy@aktoyyib.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $role = Role::where(['name' => 'Admin'])->first();
     
        $permissions = Permission::pluck('id','id')->all();
       
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);  
    }
}
