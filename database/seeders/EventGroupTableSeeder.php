<?php

namespace Database\Seeders;

use App\EventGroup;
use DB;
use Eloquent;
use Illuminate\Database\Seeder;

/**
 * Class Group
 * @package App
 * @mixin Eloquent
 */
class EventGroupTableSeeder extends Seeder
{

    private $groups = [
        0 => [
            'id' => 0,
            'class' => 'conception',
            'content' => 'Conception'
        ],
        1 => [
            'id' => 1,
            'class' => 'consultation',
            'content' => 'Consultation'
        ],
        2 => [
            'id' => 2,
            'class' => 'medical',
            'content' => 'Médical'
        ],
        3 => [
            'id' => 3,
            'class' => 'administratif',
            'content' => 'Administratif'
        ],
        4 => [
            'id' => 4,
            'class' => 'maternite',
            'content' => 'Maternité'
        ],
        5 => [
            'id' => 5,
            'class' => 'naissance',
            'content' => 'Naissance'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_groups')->delete();

        foreach ($this->groups as $group) {
            EventGroup::create($group);
        }
    }
}
