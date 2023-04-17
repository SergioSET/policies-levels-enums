<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create(
            [
                'name' => 'superadmin',
                'email' => 'superadmin@admin.com',
                'password' => bcrypt('superadmin'),
                'level' => 2
        ]);

        \App\Models\User::factory()->create(
            [
                'name' => 'contribuidor',
                'email' => 'contribuidor@contribuidor.com',
                'password' => bcrypt('contribuidor'),
                'level' => 1
        ]);
        
        \App\Models\User::factory()->create(
            [
                'name' => 'Usuario',
                'email' => 'user@user.com',
                'password' => bcrypt('user'),
                'level' => 0
        ]);

        \App\Models\User::factory(5)->create(['level' => 2, 'password' => bcrypt('123456')]);
        \App\Models\User::factory(5)->create(['level' => 1, 'password' => bcrypt('123456')]);
        \App\Models\User::factory(5)->create(['level' => 0, 'password' => bcrypt('123456')]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
