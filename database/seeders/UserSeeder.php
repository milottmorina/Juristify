<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<50000;$i++){
            DB::table('users')->insert([
            'name'=>Str::random(12),
            'surname'=>Str::random(12),
            'email'=>Str::random(12).'@gmail.com',
            'role'=>rand(0,1),
            'verified'=>rand(0,1),
            'password'=>'$2y$10$Aqp2QETtd4sIr9QfIk2Vcunbp5lqSzi8BWw6i5VFfS66l8Wj3h8VK',
            'gender'=>'Mashkull',
            'university'=>'UBT',
            'birthday'=>'2022-10-30',
            'img'=>'public/noProfilePhoto/nofoto.jpg'
        ]);
        }
        
    }
}
