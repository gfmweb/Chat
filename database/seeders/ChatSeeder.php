<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = ['users' => User::inRandomOrder()->limit(2)->pluck('id')];
        }

        foreach ($data as $item) {
            $chat = Chat::create([]);
            $chat->users()->attach($item['users']);
        }
    }
}
