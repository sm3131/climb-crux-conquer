<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClimbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climbs', function (Blueprint $table) {
            $table->id();
            $table->string('climb_name');
            $table->string('climb_location');
            $table->enum('climb_style', ['Sport', 'Trad', 'Boulder', 'Mix', 'Ice', 'Aid']);
            $table->string('climb_grade', 10);
            $table->text('climb_description');
            $table->enum('climb_status', ['to-do', 'in-progress', 'completed', 'none']);
            $table->integer('likes')->nullable();
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
        Schema::dropIfExists('climbs');
    }
}
