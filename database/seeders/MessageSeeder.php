<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Chat::distinct('id')->get()->load('users') as $chat) {
            $messageCount = rand(5, 50);
            $records = [];
            for ($mes = 0; $mes < $messageCount; $mes++) {
                $time = fake()->dateTime();
                $time2 = fake()->dateTime();
                $text = fake('ru_RU')->realText();
                $text2 = fake('ru_RU')->realText();
                $records[] = [
                    'chat_id' => $chat->id,
                    'from' => $chat->users[0]->id,
                    'message' => $text,
                    'created_at' => $time,
                    'updated_at' =>$time,
                ];
                $records[] = [
                    'chat_id' => $chat->id,
                    'from' => $chat->users[1]->id,
                    'message' => $text2,
                    'created_at' => $time2,
                    'updated_at' =>$time2,
                ];
            }
            Message::insert($records);
        }
    }
}
