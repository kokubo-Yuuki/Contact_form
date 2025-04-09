<?php


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InquiriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inquiries')->insert([
            [    
                'name' => 'jett',
                'email' => 'jett@email.com',
                'sex' => 'female',
                'category' => 'VALORANT',
                'image_path' => '',
                'play_env' => 'PS5',
                'message' => '映えるプレイが出来るようになりたいです。',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'bangalore',
                'email' => 'bangalore@email.com',
                'sex' => 'male',
                'category' => 'APEX',
                'image_path' => '',
                'play_env' => 'PC',
                'message' => 'スモークがうまく使えるようになりたいです。',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
