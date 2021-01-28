<?php
namespace Database\Seeders;

use App\Category;
use DB;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

         Category::create([
            'categoryName'      => 'Message Admin'
            ]);
         Category::create([
            'categoryName'      => 'Message Utilisateur'
            ]);
    }

}
