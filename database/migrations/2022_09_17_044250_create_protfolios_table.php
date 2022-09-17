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
        Schema::create('Protfolio', function (Blueprint $table) {
            $table->increments("ProtfolioID");
            $table->unsignedInteger("Pid");
            $table->string("ProtfolioText",100);
            $table->string("ProtfolioSub",100);
           
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('Protfolio');
    }
};
