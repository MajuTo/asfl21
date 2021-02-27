<?php

namespace Database\Seeders;

use App\Event;
use DB;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{

    private $events = [
        0 => [
            'date' => 0,
            'title' => 'Conception',
            'description' => '',
            'icon' => 'fas fa-venus-mars',
            'group_id' => 0, //'conception',
            'week' => false,
        ],
        1 => [
            'date' => 6,
            'title' => 'Consultation précoce du début de grossesse',
            'description' => '',
            'icon' => 'fas fa-stethoscope',
            'group_id' => 1, //'consultation',
            'week' => true,
        ],
        2 => [
            'date' => 10,
            'title' => '1ère échographie',
            'description' => 'Datation de la grossesse',
            'icon' => 'fas fa-user-md',
            'group_id' => 2, //'medical',
            'week' => true,
        ],
        3 => [
            'date' => 10,
            'title' => 'Éventuel dépistage de la trisomie 21',
            'description' => '',
            'icon' => 'fas fa-user-md',
            'group_id' => 2, //'medical',
            'week' => true,
        ],
        4 => [
            'date' => 11,
            'title' => 'Consultation du 3ème mois',
            'description' => '',
            'icon' => 'fas fa-stethoscope',
            'group_id' => 1, //'consultation',
            'week' => true,
        ],
        5 => [
            'date' => 11,
            'title' => 'Déclaration de grossesse',
            'description' => '',
            'icon' => 'fas fa-calendar',
            'group_id' => 3, //'administratif',
            'week' => true,
        ],
        6 => [
            'date' => 14,
            'title' => 'Éventuel dépistage (tardif) de la trisomie 21',
            'description' => '',
            'icon' => 'fas fa-user-md',
            'group_id' => 2, //'medical',
            'week' => true,
        ],
        7 => [
            'date' => 15,
            'title' => 'Entretien pré-natal avec la sage femme pour la préparation à la naissance',
            'description' => '',
            'icon' => 'fas fa-stethoscope',
            'group_id' => 1, //'consultation',
            'week' => true,
        ],
        8 => [
            'date' => 16,
            'title' => 'Reconnaissance anticipée du père',
            'description' => '',
            'icon' => 'fas fa-calendar',
            'group_id' => 3, //'administratif',
            'week' => true,
        ],
        9 => [
            'date' => 16,
            'title' => 'Consultation du 4ème mois',
            'description' => '',
            'icon' => 'fas fa-stethoscope',
            'group_id' => 1, //'consultation',
            'week' => true,
        ],
        10 => [
            'date' => 18,
            'title' => 'Début de prise en charge 100% médical',
            'description' => '',
            'icon' => 'fas fa-calendar',
            'group_id' => 3, //'administratif',
            'week' => true,
        ],
        11 => [
            'date' => 20,
            'title' => 'Consultation 5ème mois',
            'description' => '',
            'icon' => 'fas fa-stethoscope',
            'group_id' => 1, //'consultation',
            'week' => true,
        ],
        12 => [
            'date' => 20,
            'title' => '2ème échographie, échographie morphologique',
            'description' => '',
            'icon' => 'fas fa-user-md',
            'group_id' => 2, //'medical',
            'week' => true,
        ],
        13 => [
            'date' => 23,
            'title' => 'Biologie du 6ème mois',
            'description' => '',
            'icon' => 'fas fa-user-md',
            'group_id' => 2, //'medical',
            'week' => true,
        ],
        14 => [
            'date' => 24,
            'title' => 'Consultation 6ème mois',
            'description' => '',
            'icon' => 'fas fa-stethoscope',
            'group_id' => 1, //'consultation',
            'week' => true,
        ],
        15 => [
            'date' => 29,
            'title' => 'Consultation 7ème mois (Maternité)',
            'description' => '',
            'icon' => 'fas fa-h-square',
            'group_id' => 4, //'hopital',
            'week' => true,
        ],
        16 => [
            'date' => 30,
            'title' => '3ème échographie',
            'description' => '',
            'icon' => 'fas fa-stethoscope',
            'group_id' => 1, //'consultation',
            'week' => true,
        ],
        17 => [
            'date' => 32,
            'title' => 'Consultation 8ème mois',
            'description' => '',
            'icon' => 'fas fa-h-square',
            'group_id' => 4, //'hopital',
            'week' => true,
        ],
        18 => [
            'date' => 32,
            'title' => 'Début éventuel de congés pathologique',
            'description' => '',
            'icon' => 'fas fa-calendar',
            'group_id' => 3, //'administratif',
            'week' => true,
        ],
        19 => [
            'date' => 33,
            'title' => 'Consultation anesthésiste (dans la maternité choisie)',
            'description' => '',
            'icon' => 'fas fa-h-square',
            'group_id' => 4, //'hopital',
            'week' => true,
        ],
        20 => [
            'date' => 33,
            'title' => 'Début de congés maternité officiel',
            'description' => '',
            'icon' => 'fas fa-calendar',
            'group_id' => 3, //'administratif',
            'week' => true,
        ],
        21 => [
            'date' => 33,
            'title' => 'Réalisation de prélèvement vaginal',
            'description' => '',
            'icon' => 'fas fa-user-md',
            'group_id' => 2, //'medical',
            'week' => true,
        ],
        22 => [
            'date' => 36,
            'title' => 'Consultation 9ème mois',
            'description' => '',
            'icon' => 'fas fa-h-square',
            'group_id' => 4, //'hopital',
            'week' => true,
        ],
        23 => [
            'date' => 39,
            'title' => 'Date présumée de l\'accouchement',
            'description' => '',
            'icon' => 'fas fa-gift',
            'group_id' => 5, //'naissance',
            'week' => true,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();

        foreach ($this->events as $event) {
            Event::create($event);
        }
    }
}
