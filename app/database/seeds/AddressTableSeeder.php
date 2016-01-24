<?php

class AddressTableSeeder extends Seeder {

    public function run()
    {
        DB::table('addresses')->delete();

         Address::create([
            'user_id'   => 1,
            'address'   => 'stairway to heaven, 42',
            'zipCode'   => '222',
            'city'      => 'Dijon',
            'phone'     => 1234567890,
            'fax'       => 9876543210,
            'hideFax'   => 1,
            'lat'       => 47.308316, 
            'lng'       => 5.048444
            ]);
        Address::create([
            'user_id'   => 2,
            'address'   => 'stairway to heaven, 42',
            'zipCode'   => '222',
            'city'      => 'Dijon',
            'phone'     => 1234567890,
            'fax'       => 9876543210,
            'hideFax'   => 1,
            'lat'       => 47.322974,
            'lng'       => 5.035643
            ]);
    }

}