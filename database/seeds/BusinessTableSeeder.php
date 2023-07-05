<?php

use Illuminate\Database\Seeder;
use App\Businesses;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Businesses::create([
            'name'=>'CORPORACION IBGROUP S.A.C.',
            'description'=>'Descripción corta de la empresa.',
            'logo'=>'logo.png',
            'mail'=>'jruiz@corpibgroup.com',
            'address'=>'Av. Club Golf los Incas 208, Santiago de Surco, Peru.',
            'ruc'=>'20550198275',
        ]);
    }
}
