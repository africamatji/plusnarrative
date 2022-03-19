<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Faker\Factory as Faker;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        //admin user
        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $admin_role = Role::create(['name' => 'admin']); 
        $admin_role->givePermissionTo('view-admin-dashboard');
        $admin_role->givePermissionTo('administer-users');
        $admin_user->assignRole($admin_role);

        //content manager
        $content_manager_user = User::create([
            'name' => 'ContentManager',
            'email' => 'cm@mail.com',
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $cm_role = Role::create(['name' => 'content_manager']); 
        $cm_role->givePermissionTo('view-admin-dashboard');
        $content_manager_user->assignRole($cm_role);

        $x = 1;
        $user_role = Role::create(['name' => 'user']); 
        while ($x <= 98) {
            $user = User::create([
                'name' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'last_name' => $this->faker->lastName,
                'first_name' => $this->faker->firstName,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]);
            $user->assignRole($user_role);
            $x++;
        }
    }
}
