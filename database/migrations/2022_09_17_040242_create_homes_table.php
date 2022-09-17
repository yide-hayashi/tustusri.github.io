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
        Schema::create('Homes', function (Blueprint $table) {
            $table->increments("HomeID");
            $table->unsignedInteger("Pid");
            $table->text("LogoImg");
            $table->string("HomePageSubhead",100);
            $table->string("HomeText",100);
            $table->string("HomeSubtext",100);
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
        Schema::dropIfExists('Homes');
    }
};
