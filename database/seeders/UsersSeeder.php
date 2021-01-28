<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $user = User::create([
            'branch_id' =>  1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($admin);

        $userRole = Role::create(['name' => 'user']);
        $user = User::create([
            'branch_id' =>  1,
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($userRole);

        $deliveryAgegent = Role::create(['name' => 'delivery_agent']);
        $user = User::create([
            'branch_id' => 1,
            'name' => 'Delivery Agent',
            'email' => 'delivery_agent@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($deliveryAgegent);
    }
}
