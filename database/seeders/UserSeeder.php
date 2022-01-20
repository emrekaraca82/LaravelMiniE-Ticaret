<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            'name'=>'MS Teknoloji',
            'email'=>'msteknoloji@admin.com',
            'type'=>'admin',
            'address'=>'Orta Mh. Ankara Caddesi No:2 D:21 Kat:3, 34892 Pendik/İstanbul',
            'phone'=>'0850 532 6700',   
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

    }
}
