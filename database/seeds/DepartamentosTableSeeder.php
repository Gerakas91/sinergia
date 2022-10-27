<?php

use Illuminate\Database\Seeder;
use App\Departamento;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::insert(['nombdepa' => 'Tolima']);
        Departamento::insert(['nombdepa' => 'Huila']);
        Departamento::insert(['nombdepa' => 'Cauca']);
        Departamento::insert(['nombdepa' => 'Meta']);
        Departamento::insert(['nombdepa' => 'Valle del cauca']);
    }
}
