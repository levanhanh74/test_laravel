<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_tbs', function (Blueprint $table) {
            $table->string('team_id', 20)->primary();
            $table->string('team_name', 50);
            $table->string('department_id', 20);
            $table->foreign('department_id')  
                ->references('department_id') 
                ->on('department_tbs')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_tbs');
    }
};
