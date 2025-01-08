<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(2)->create();
        //coordinator
        User::factory()->create([
            'name' => 'coordinator1',
            'email' => 'coor1@gmail.com',
            'password' => bcrypt('password'),
            'usertype' => 'coordinator'
        ]);
        //student
        User::factory()->create([
            'name' => 'student1',
            'email' => 'student1@gmail.com',
            'password' => bcrypt('password'),
            'usertype' => 'student'
        ]);

        // $this->call(UserTableSeeder::class);
    }
}
