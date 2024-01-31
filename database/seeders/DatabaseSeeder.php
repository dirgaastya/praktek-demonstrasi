<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Participant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Dirga Astya Wisnuwardana',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin1234'),
        ]);
        $this->call(SchemeSeeder::class);
        $this->call(ParticipantSeeder::class);
    }
}
