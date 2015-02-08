<?php

class MessageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('messages')->delete();

         Message::create([
            'title'      => 'Message 1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit eaque architecto animi voluptatum ullam amet, odit voluptas nihil consectetur itaque quo labore. Officia vitae pariatur architecto et, dolore! Est illo adipisci pariatur eius, distinctio, soluta, nobis ex enim perferendis maiores vel veniam placeat quaerat eum, incidunt nisi! Debitis enim fugiat maxime similique, labore ipsam necessitatibus animi cumque consectetur. Perferendis repellendus aspernatur voluptatum ab quis, dolor excepturi quas illum rem. Fugiat rerum temporibus, commodi ipsa voluptas voluptatem vitae labore odio ab dicta, impedit esse velit pariatur? Blanditiis amet, nam animi dolorem, quas rerum atque dolores enim saepe facilis, praesentium mollitia id! Cumque excepturi delectus amet, esse quos, voluptatibus eum perferendis. Autem dignissimos rerum modi aliquid. Odio aspernatur, inventore aperiam quas, dolorem unde numquam fuga dolores quod in doloribus est qui, enim nemo veniam. Ut sint nobis facilis iste officia, laboriosam nulla minus provident impedit necessitatibus perferendis sunt qui libero explicabo ducimus vitae similique corporis reiciendis rem dolorum odit animi quae? Perspiciatis animi ab voluptates ipsa, totam rem sed voluptas, cupiditate laboriosam, nesciunt incidunt, eius. Voluptas harum hic debitis fugit optio, a voluptatibus ullam provident minus architecto. Dolore odit quis eum dicta consectetur ipsam eius velit deserunt natus, ratione repellat sit rem?',
            'category_id'  => 1,
            'user_id'  => 1
            ]);
         Message::create([
            'title'      => 'Message 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit eaque architecto animi voluptatum ullam amet, odit voluptas nihil consectetur itaque quo labore. Officia vitae pariatur architecto et, dolore! Est illo adipisci pariatur eius, distinctio, soluta, nobis ex enim perferendis maiores vel veniam placeat quaerat eum, incidunt nisi! Debitis enim fugiat maxime similique, labore ipsam necessitatibus animi cumque consectetur. Perferendis repellendus aspernatur voluptatum ab quis, dolor excepturi quas illum rem. Fugiat rerum temporibus, commodi ipsa voluptas voluptatem vitae labore odio ab dicta, impedit esse velit pariatur? Blanditiis amet, nam animi dolorem, quas rerum atque dolores enim saepe facilis, praesentium mollitia id! Cumque excepturi delectus amet, esse quos, voluptatibus eum perferendis. Autem dignissimos rerum modi aliquid. Odio aspernatur, inventore aperiam quas, dolorem unde numquam fuga dolores quod in doloribus est qui, enim nemo veniam. Ut sint nobis facilis iste officia, laboriosam nulla minus provident impedit necessitatibus perferendis sunt qui libero explicabo ducimus vitae similique corporis reiciendis rem dolorum odit animi quae? Perspiciatis animi ab voluptates ipsa, totam rem sed voluptas, cupiditate laboriosam, nesciunt incidunt, eius. Voluptas harum hic debitis fugit optio, a voluptatibus ullam provident minus architecto. Dolore odit quis eum dicta consectetur ipsam eius velit deserunt natus, ratione repellat sit rem?',
            'category_id'  => 2,
            'user_id'  => 2
            ]);
    }

}