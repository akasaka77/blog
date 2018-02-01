<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Muhammad Naufal',
            'email' => 'naufal@akasaka.me',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor tempus laoreet. Praesent non scelerisque massa. Fusce laoreet nibh convallis dapibus commodo. Donec vel hendrerit neque. Nam luctus ligula vitae nibh molestie, ut convallis ligula sodales. Nullam eleifend libero vitae turpis commodo eleifend. Mauris eu mollis ante. Suspendisse viverra elit non tortor vehicula tincidunt. Donec eleifend libero erat, a suscipit tellus suscipit non. Sed bibendum fringilla mi at porttitor. Morbi vel dui quis erat malesuada tempor venenatis a urna. In hac habitasse platea dictumst.',
            'facebook' => 'facebook.com/akasaka77',
            'youtube' => 'youtube.com',
        ]);

    }
}
