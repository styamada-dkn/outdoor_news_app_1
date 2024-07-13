<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users =[
            User::factory()->create(['name' => '保下 太郎','nickname' => 'taro','email' => 'taro@example.com','password' => '12345678']),
            User::factory()->create(['name' => '帆下 次郎','nickname' => 'jiro','email' => 'jiro@example.com','password' => '12345678']),
            User::factory()->create(['name' => '穂外 三郎','nickname' => 'saburo','email' => 'saburo@example.com','password' => '12345678']),
            User::factory()->create(['name' => '歩外 四郎','nickname' => 'siro','email' => 'siro@example.com','password' => '12345678']),
            User::factory()->create(['name' => '捕夏 五郎','nickname' => 'goro','email' => 'goro@example.com','password' => '12345678']),
            User::factory()->create(['name' => '場亜 花子','nickname' => 'hanako','email' => 'hanako@example.com','password' => '12345678']),
            User::factory()->create(['name' => '馬亜 春子','nickname' => 'haruko','email' => 'haruko@example.com','password' => '12345678']),
            User::factory()->create(['name' => '芭阿 夏子','nickname' => 'natuko','email' => 'natuko@example.com','password' => '12345678']),
            User::factory()->create(['name' => '場阿 秋子','nickname' => 'akiko','email' => 'akiko@example.com','password' => '12345678']),
            User::factory()->create(['name' => '葉唖 冬子','nickname' => 'fuyuko','email' => 'fuyuko@example.com','password' => '12345678']),
        ];

        foreach($users as $user){

            Blog::factory(5)->create(['user_id' => $user->id]);
        }

    }
}
