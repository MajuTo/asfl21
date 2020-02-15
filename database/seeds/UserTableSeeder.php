<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

         User::create([
            'name'      => 'RICHTER',
            'firstname' => 'Alexis',
            'username'  => 'root',
            'password'  => Hash::make('root'),
            'email'     => 'admin@musaya.net',
            'mobile'    => '987654321',
            'group_id' => 3
            ]);
         User::create([
            'name'      => 'RAY',
            'firstname' => 'Thomas',
            'username'  => 'rooot',
            'password'  => Hash::make('root'),
            'email'     => 'majuto@free.fr',
            'mobile'    => '987654321',
            'group_id' => 3
            ]);
    }

}
