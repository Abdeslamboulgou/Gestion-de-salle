<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [  'uid'=>'ref1',
               'firstName'=>'admin',
               'lastName'=>'ADMIN',

               'email'=>'admin@gmail.com',
               'password'=> bcrypt('123456'),
               'country' => 'France',
               'city' => 'BLENDECQUES',
               'adresse' => '12 RUE JULES VERNE ',
               'adressComplement' => ' ',
               'zipCode' =>  62575,
               'telephon' => "08 92 97 61 70",
               'is_admin'=>1,
               'is_user'=>0,
            ],
            [    'uid'=>'ref2',
                'firstName'=>'user',
                'lastName'=>'USER',
               'email'=>'user@gmail.com',
               'password'=> bcrypt('123456'),
               'country' => 'France',
               'city' => 'calais',
               'adresse' => '174 RUE MICHEL ANGE ',
               'adressComplement' => ' ',
               'zipCode' =>  62100,
               'telephon' => "07 22 22 22 22",
               'is_admin'=>0,
               'is_user'=>1,
            ],

        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
    
}
