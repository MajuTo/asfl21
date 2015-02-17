<?php

class ActivityTableSeeder extends Seeder {

    public function run()
    {
        DB::table('activities')->delete();

         Activity::create([
            'activityName'      => 'Entretien pré natal',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita beatae autem ad officiis sequi maiores numquam officia veniam debitis dignissimos amet quasi atque in, cum ipsa? Sint aspernatur, quasi minus?'
            ]);
         Activity::create([
            'activityName'      => 'Préparation a la naissance',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores culpa, fuga eos odio in dolorum accusantium sapiente blanditiis nam laborum neque, asperiores reiciendis nulla eveniet! Fuga beatae, eaque iste explicabo!'
            ]);
         Activity::create([
            'activityName'      => 'Déclaration de grossesse',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non rem maxime, recusandae ipsa soluta, quibusdam cum, earum aliquam totam officiis in, est tempora. Dignissimos numquam, tempore enim, rerum molestiae eaque!'
            ]);
         Activity::create([
            'activityName'      => 'Suivi médical de grossesse',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere a dolor fugiat aperiam cum corporis quis consectetur veritatis corrupti perspiciatis eaque tempore praesentium alias ipsa veniam magnam, impedit minus sunt.'
            ]);
         Activity::create([
            'activityName'      => 'Surveillance à domicile de la grossesse ',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dignissimos, assumenda, cupiditate quam architecto eos fuga minus exercitationem dolores corrupti laudantium quidem vitae optio, reprehenderit ex porro illo tempora nobis?'
            ]);
         Activity::create([
            'activityName'      => 'Visite post-accouchement à domicile ',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse officia magnam maxime iusto optio iure libero veniam, at odio saepe enim similique perspiciatis veritatis repellendus corrupti labore exercitationem impedit nihil?'
            ]);
         Activity::create([
            'activityName'      => 'Consultation post-natale',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus necessitatibus repudiandae ducimus eveniet eos omnis harum atque, dolor ipsam, ab incidunt voluptatem laboriosam ut soluta nulla. Nulla numquam, similique alias.'
            ]);
         Activity::create([
            'activityName'      => 'Rééducation du périnée',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam ab eligendi magnam, obcaecati amet, porro quod sunt nesciunt debitis dolorem aliquid reiciendis facilis doloribus minima dolorum dignissimos aliquam cum asperiores!'
            ]);
         Activity::create([
            'activityName'      => 'Suivi gynécologique',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia et dolorem cupiditate harum quod eligendi iure distinctio nemo sed vitae nostrum eum, quisquam modi tempore. Provident, facilis maiores ipsam voluptate.'
            ]);
         Activity::create([
            'activityName'      => 'Sexologie',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit consequuntur, libero architecto, eius, quibusdam ullam ipsum iure repellendus illum quos et odit facere natus atque. Repellat eligendi nisi, ad saepe!'
            ]);
         Activity::create([
            'activityName'      => 'rééducation périnéale',
            'activityDesc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus libero fugit neque, omnis error iure natus! Voluptas hic cupiditate odit architecto dolores, ut illo eligendi doloremque porro voluptate laudantium ipsum.'
            ]);
    }

}