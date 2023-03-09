<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        // User::factory()->create([
        //     'email' => 'ahsoka.tano@q.agency',
        //     'password' => 'Kryze4President',
        // ]);
        User::factory()->create([
            'email' => 'ahsoka.tano@q.agency',
            'password' => bcrypt('Kryze4President'),
        ]);
    }
}
