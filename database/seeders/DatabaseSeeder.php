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

        $categorys = ['Communication','VHF','HF','ATIS','VSCS','RECORDER','Navigation','DVOR','DME','Automation','ATCAS','AMSC','Survellance'];
        $fasilitass = ['ILS','RADAR MSSR','ADSB'];
        foreach($categorys as $category){
            Category::create([
                'name' => $category,
            ]);
        }

        foreach($fasilitass as $fasilitas){
            Fasilitas::create([
                'name' => $fasilitas
            ]);
        }
        



        
    }
}
