<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\TipoIdentificacion;

class TiposDocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoIdentificacion::insert([
            'name' => 'CC'
        ]);
        TipoIdentificacion::insert([
            'name' => 'TI'
        ]);
        TipoIdentificacion::insert([
            'name' => 'RC'
        ]);
        TipoIdentificacion::insert([
            'name' => 'PASAPORTE'
        ]);
    }
}
