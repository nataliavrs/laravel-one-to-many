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
        Schema::table('tasks', function(Blueprint $table){

            $table -> foreign('employee_id', 'employee_task')
            -> references('id')
            -> on('employees');

        });

        Schema::table('employee_location', function(Blueprint $table){

            $table -> foreign('employee_id', 'el-employee')
            -> references('id')
            -> on('employees');

            $table -> foreign('location_id', 'el-location')
            -> references('id')
            -> on('locations');

        });


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('employee_location', function(Blueprint $table){

            $table -> dropForeign('el-location');
            $table -> dropForeign('el-employee');
                        
        });

        Schema::table('tasks', function(Blueprint $table){

            $table -> dropForeign('employee_task');
                        
        });
    }
}
