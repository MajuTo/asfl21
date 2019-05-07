<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('messages')->delete();

         Message::create([
            'title'      => 'Message 1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores adipisci corrupti dolorum omnis voluptate placeat, provident officia dolores, tempore nam!',
            'category_id'  => 1,
            'user_id'  => 1
            ]);
         Message::create([
            'title'      => 'Message 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 2,
            'user_id'  => 2
            ]);
         Message::create([
            'title'      => 'Message 3',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 1,
            'user_id'  => 2
            ]);
         Message::create([
            'title'      => 'Message 4',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 2,
            'user_id'  => 1
            ]);
         Message::create([
            'title'      => 'Message 5',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 1,
            'user_id'  => 1
            ]);
         Message::create([
            'title'      => 'Message 6',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 2,
            'user_id'  => 2
            ]);
         Message::create([
            'title'      => 'Message 7',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 1,
            'user_id'  => 2
            ]);
         Message::create([
            'title'      => 'Message 8',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 2,
            'user_id'  => 2
            ]);
         Message::create([
            'title'      => 'Message 9',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 1,
            'user_id'  => 2
            ]);
         Message::create([
            'title'      => 'Message 10',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae veniam similique a nesciunt incidunt, dicta quos ipsa perspiciatis modi!',
            'category_id'  => 2,
            'user_id'  => 1
            ]);
    }

}