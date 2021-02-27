<?php
namespace Database\Seeders;

use Eloquent;
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
        $this->call(GroupTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        $this->call(LinkTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(EventGroupTableSeeder::class);
        $this->call(EventTableSeeder::class);
    }
}
