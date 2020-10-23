<?php

use Illuminate\Database\Seeder;

class turnos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Turnodetalle::Class,55) ->create();
    }
}
