<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

         User::create([
            'name'      => 'Alexis',
            'firstName' => 'Richter',
            'username'  => 'root',
            'password'  => Hash::make('root'),
            'email'     => 'admin@musaya.net',
            'phone'     => '123456789',
            'mobile'    => '987654321',
            'fax'       => '',
            'address'   => 'stairway to heaven, 42',
            'zipCode'   => '222',
            'city'      => 'Dijon',
            'group_id' => 1
            ]);
    }

}