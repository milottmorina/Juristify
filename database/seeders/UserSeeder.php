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
      
            DB::table('users')->insert([
            'name'=>'Florian',
            'surname'=>'Murseli',
            'email'=>'florian'.'@gmail.com',
            'role'=>1,
            'verified'=>1,
            'password'=>'$2y$10$Aqp2QETtd4sIr9QfIk2Vcunbp5lqSzi8BWw6i5VFfS66l8Wj3h8VK',
            'gender'=>'Mashkull',
            'university'=>'UBT',
            'birthday'=>'2002-10-30',
            'img'=>'public/noProfilePhoto/nofoto.jpg',
             'id_card'=>'public/id_kartela/LmEEd5z8RfqWjfQ0SW5siIOKsG7bYHfPKWTqpJEG.png'
        ]);
     
        
    }
}
