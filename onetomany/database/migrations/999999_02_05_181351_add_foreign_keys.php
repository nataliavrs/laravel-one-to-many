<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // ONE TO MANY TASKS AND EMPLOYEES
        Schema::table('tasks', function(Blueprint $table){

            $table -> foreign('employee_id', 'employee_task')
            -> references('id')
            -> on('employees');

        });

        // MANY TO MANY EMPLOYEES AND LOCATIONS
        Schema::table('employee_location', function(Blueprint $table){

            $table -> foreign('employee_id', 'el-employee')
            -> references('id')
            -> on('employees');

            $table -> foreign('location_id', 'el-location')
            -> references('id')
            -> on('locations');

        });

        // MANY TO MANY TASKS AND TYPOLOGIES
        Schema::table('task_typology', function(Blueprint $table){

            $table -> foreign('task_id', 'fk_task')
            -> references('id')
            -> on('tasks');

            $table -> foreign('typology_id', 'fk-typology')
            -> references('id')
            -> on('typologies');

        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('task_typology', function(Blueprint $table){

            $table -> dropForeign('fk-typology');
            $table -> dropForeign('fk_task');
                        
        });

        Schema::table('employee_location', function(Blueprint $table){

            $table -> dropForeign('el-location');
            $table -> dropForeign('el-employee');
                        
        });

        Schema::table('tasks', function(Blueprint $table){

            $table -> dropForeign('employee_task');
                        
        });
    }
}
