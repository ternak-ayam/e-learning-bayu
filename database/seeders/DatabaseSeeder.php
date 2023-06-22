<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        User::create([
            'name' => 'I Kadek Agus Bagus',
            'email' => 'agus@gmail.com',
            'password' => password_hash('password', PASSWORD_ARGON2I),
            'tgl_lahir' => '20/09/2000',
            'alamat' => 'Jln Ngurah Rai',
            'phone' => '0812345678',
            'tempat_lahir' => 'Amlapura'
        ]);

        Admin::create([
            'name' => 'Budi',
            'email' => 'admin@gmail.com',
            'password' => password_hash('password', PASSWORD_ARGON2I),
        ]);
    }
}
