<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       

        //primero crear migrasiones sin FK en orden.

        
        // $this->call(UsersTableSeeder::class);
        /*                                              //giving troubles
        $this->call([       
            EmpleadosTableSeeder::class,
            EquipoSeeder::class,  //it literallysays comma
           // reportesmedicos::class,
            //turnos::class,
        ]);*/
        $this->call(EmpleadosTableSeeder::class);
        $this->call(areasseeder::class);
        $this->call(EquipoSeeder::class);
        $this->call(reportesmedicos::class);
        $this->call(turnos::class);
    }
}
