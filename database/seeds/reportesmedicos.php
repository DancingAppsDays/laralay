<?php

use Illuminate\Database\Seeder;

class reportesmedicos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Reportemedico::Class,55) ->create();
    }
}
