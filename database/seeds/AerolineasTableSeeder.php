<?php

use Illuminate\Database\Seeder;

class AerolineasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aerolineas = factory(App\Aerolinea::class, 20)->make();

        foreach ($aerolineas as $aerolinea) {
            repeat:
            try {
                $aerolinea->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $aerolinea = factory(App\Aerolinea::class)->make();
                goto repeat;
            }
        }
    }
}
