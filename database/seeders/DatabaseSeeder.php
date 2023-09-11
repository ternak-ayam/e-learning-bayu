<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Fasilitas;
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

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
        ]);

        $categorys = ['Communication','Navigation','Survellance','Automation'];
        $fasilitass = [
            [
                'name' => 'VHF',
                'id' => 1
            ],
            [
                'name' => 'HF',
                'id' => 1
            ],
            [
                'name' => 'ATIS',
                'id' => 1
            ],
            [
                'name' => 'VSCS',
                'id' => 1
            ],
             [
                'name' => 'RECORDER',
                'id' => 1
            ],
             [
                'name' => 'ILS',
                'id' => 2
            ],
             [
                'name' => 'DVOR',
                'id' => 2
            ],
            [
                'name' => 'DME',
                'id' => 2
            ],
            [
                'name' => 'RADAR MSSR',
                'id' => 3
            ],
            [
                'name' => 'ADSB',
                'id' => 3
            ],
            [
                'name' => 'ATCAS',
                'id' => 4
            ],
            [
                'name' => 'AMSC',
                'id' => 4
            ],
            
        ];
        foreach($categorys as $category){
            Category::create([
                'name' => $category,
            ]);
        }

        foreach($fasilitass as $fasilitas){
            Fasilitas::create([
                'name' => $fasilitas['name'],
                'category_id' => $fasilitas['id']
            ]);
        }
        



        
    }
}
