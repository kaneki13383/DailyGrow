<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
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

        \App\Models\Client::factory()->create([
            'all_name' => 'Иван Иванов',
            'number' => '79000010000',
            'email' => 'test@example.com',
            'birthday' => Carbon::parse('22.02.1999')
        ]);
        \App\Models\Client::factory()->create([
            'all_name' => 'Алексей Петров',
            'number' => '79000010010',
            'email' => 'test2@example.com',
            'birthday' => Carbon::parse('23.02.1999')
        ]);
        \App\Models\Client::factory()->create([
            'all_name' => 'Констанин Жаров',
            'number' => '79000010020',
            'email' => 'test3@example.com',
            'birthday' => Carbon::parse('24.02.1999')
        ]);
        \App\Models\Client::factory()->create([
            'all_name' => 'Максим Леонов',
            'number' => '79000010030',
            'email' => 'test4@example.com',
            'birthday' => Carbon::parse('25.02.1999')
        ]);
        \App\Models\Client::factory()->create([
            'all_name' => 'Денис Турушев',
            'number' => '79005250538',
            'email' => 'test4@example.com',
            'birthday' => Carbon::parse('26.02.1999')
        ]);
    }
}
