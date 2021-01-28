<?php
namespace Database\Seeders;

use App\Link;
use DB;
use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder {

    public function run()
    {
        DB::table('links')->delete();

         Link::create([
            'linkName'  => 'CAF',
            'link'      => 'http://www.caf.fr',
            'address'      => '',
            'zipCode'      => '',
            'city'      => '',
            'phone'      => ''
            ]);
         Link::create([
            'linkName'  => 'CHU Dijon',
            'link'      => 'http://www.chu-dijon.fr/',
            'address'      => '',
            'zipCode'      => '',
            'city'      => '',
            'phone'      => ''
            ]);
    }

}
