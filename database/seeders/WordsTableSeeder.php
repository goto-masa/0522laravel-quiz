<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $titles = [
            'apple' => 'リンゴ',
            'orange' => 'みかん',
            'banana' => 'バナナ',
            'implicit' => '暗黙',
            'priority' => '優先順位',
            'indicate' => '示す'
        ];

        foreach ($titles as $title => $translation) {
            DB::table('words')->insert([
                'title' => $title,
                'translation' => $translation,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
