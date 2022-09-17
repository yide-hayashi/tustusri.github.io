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
        Schema::create('Categories', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("ProtfolioContentID");
            $table->string("PopupCategory",100);
            $table->timestamps();
            $table->foreign("ProtfolioContentID")->references("ProtfolioContentID")->on("ProtfolioContents");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Categories');
    }
};
