<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCraftVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_craft_villages', function (Blueprint $table) {
            $table->id();
            $table->integer('craft_village_id')->unsigned()->index();
            $table->unsignedBigInteger('acreage');
            $table->integer('total_family');
            $table->integer('total_people');
            $table->integer('total_employees');
            $table->integer('total_income');
            $table->integer('average income');
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
        Schema::dropIfExists('detail_craft_villages');
    }
}
