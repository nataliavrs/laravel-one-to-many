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
        factory(Location::class, 10)
        -> create()
        -> each(function($loc) {

            $emps = Employee::inRandomOrder()
                -> limit(5) -> get();
            $loc -> employees() -> attach($emps);

        });
    }
}
