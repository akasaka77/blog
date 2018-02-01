<?php

use \App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'site_name' => "Laravel's Blog",
            'contact_number' => '0822 9937 9493',
            'contact_email' => 'info@laravel_blog.com',
            'address' => 'Tembalang, Semarang, Jawa Tengah',
            'about_site' => 'Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham                             liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.                             Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl                             ut aliquip ex ea commodo consequat eleifend option nihil. Investigationes demonstraverunt                             lectores legere me lius quod ii legunt saepius parum claram.',
        ]);
    }
}
