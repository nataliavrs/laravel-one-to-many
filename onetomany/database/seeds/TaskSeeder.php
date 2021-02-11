<?php

use App\Employee;
use App\Task;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 15) 
            -> make()
            -> each(function($task) {

                $employee = Employee::inRandomOrder() -> first();
                $task -> employee() -> associate($employee);
                $task -> save();

            });
    }
}
