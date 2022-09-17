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
        Schema::create('Contancts', function (Blueprint $table) {
            $table->increments("ContanctsID");
            $table->unsignedInteger("Pid");
            $table->text("img");
            $table->string("ContanctTitle",100);
            $table->text("ContanctText");

            $table->softDeletes();
            $table->timestamps();

            $table->foreign("Pid")->references("Pid")->on("PageNames");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Contancts');
    }
};
