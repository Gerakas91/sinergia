<?php

use Illuminate\Database\Seeder;
use App\Municipio;

class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipio::insert(['nombmuni' => 'Neiva', 'iddepa' => 2]);
        Municipio::insert(['nombmuni' => 'Agrado', 'iddepa' => 2]);
        Municipio::insert(['nombmuni' => 'Ibague', 'iddepa' => 1]);
        Municipio::insert(['nombmuni' => 'Cali', 'iddepa' => 5]);
    }
}
