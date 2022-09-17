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
        Schema::create('ContanctSofts', function (Blueprint $table) {
            $table->increments("SoftID");
            $table->unsignedInteger("ContanctsID");
            $table->text("icon");
            $table->text("link");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("ContanctsID")->references("ContanctsID")->on("Contancts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ContanctSofts');
    }
};
