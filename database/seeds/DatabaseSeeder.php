<?php

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
        Eloquent::unguard();
        $this->call('GroupTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('ActivityTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('MessageTableSeeder');
        $this->call('LinkTableSeeder');
        $this->call('AddressTableSeeder');
    }
}
