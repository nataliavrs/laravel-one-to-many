<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Location::class, 5)
        -> create()
        -> each(function($loc) { //$loc = Location::findOrFail(XX)

            $emps = Employee::inRandomOrder()
                -> limit(5) -> get(); // versione di all con i filtri
            
            $loc -> employees() -> attach($emps); // inserire e associare uno 
            // o piu employees

        });
    }
}
