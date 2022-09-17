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
        Schema::create('Histories', function (Blueprint $table) {
            $table->increments("HistoresID");
            $table->unsignedInteger("Pid");
            $table->year("Startyear");
            $table->year("Endtyear");
            $table->string("PageSubtext",200);
            $table->string("ContentTitle",100);
            $table->text("ContentSub");
            $table->text("img");
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
        Schema::dropIfExists('Histories');
    }
};
