<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heirs', function (Blueprint $table) {
            $table->id();
            $table->integer('expert_id')->unsigned()->index();
            $table->string('name');
            $table->timestamps('date_of_birth');
            $table->timestamps('year_job_transmission');
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
        Schema::dropIfExists('heirs');
    }
}
