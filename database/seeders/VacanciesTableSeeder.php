<?php

namespace Database\Seeders;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacanciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacancies')->insert([
            'id' => Uuid::generate(),
            'title' => 'React Developer',
            'description' => 'Wij zijn op zoek naar een skillvolle React Developer voor ons team.',
            'skills' => 'HTML, CSS, JS',
            'address' => 'Zernikedreef 11',
            'deadline' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
