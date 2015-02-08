<?php

class GroupTableSeeder extends Seeder {

    public function run()
    {
        DB::table('groups')->delete();

         Group::create([
            'groupName'      => 'Adhérents'
            ]);
         Group::create([
            'groupName'      => 'Admins'
            ]);
         Group::create([
            'groupName'      => 'Développeurs'
            ]);
    }

}