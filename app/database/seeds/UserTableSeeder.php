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
            'phone'     => '123456789',
            'mobile'    => '987654321',
            'fax'       => '',
            'address'   => 'stairway to heaven, 42',
            'zipCode'   => '222',
            'city'      => 'Dijon',
            'group_id' => 2
            ]);
         User::create([
            'name'      => 'RAY',
            'firstname' => 'Thomas',
            'username'  => 'rooot',
            'password'  => Hash::make('root'),
            'email'     => 'majuto@free.fr',
            'phone'     => '123456789',
            'mobile'    => '987654321',
            'fax'       => '',
            'address'   => 'stairway to heaven, 42',
            'zipCode'   => '222',
            'city'      => 'Dijon',
            'group_id' => 3
            ]);
    }

}