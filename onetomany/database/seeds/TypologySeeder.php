<?php

use Illuminate\Database\Seeder;
use App\Typology;
use App\Task;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Typology::class, 10)
            -> create()
            -> each(function($typology) {

                $tasks = Task::inRandomOrder()
                    -> limit(3) -> get();
                
                $typology -> employees() -> attach($tasks);

            });
    }
}
