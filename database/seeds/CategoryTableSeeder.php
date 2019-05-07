<?php

use App\Category;
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