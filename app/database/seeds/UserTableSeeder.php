<?php

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
            'fax'       => '',
            'confirmation' => '1234789',
            'group_id' => 3
            ]);
         User::create([
            'name'      => 'RAY',
            'firstname' => 'Thomas',
            'username'  => 'rooot',
            'password'  => Hash::make('root'),
            'email'     => 'majuto@free.fr',
            'mobile'    => '987654321',
            'fax'       => '',
            'confirmation' => '123478',
            'group_id' => 3
            ]);
    }

}