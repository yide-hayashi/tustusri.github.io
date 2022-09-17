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
        Schema::create('ProtfolioContents', function (Blueprint $table) {
            $table->increments("ProtfolioContentID");
            $table->unsignedInteger("Pid");
            $table->text("ProtfolioContentImg");
            
            $table->string("ProtfolioProjectName",100);
            $table->text("ProtfolioProjectContent");
            $table->text("PopupImg");
            $table->string("PopupName",100);
            $table->string("PopupSubtext",100);
            $table->text("PopupContent");
            $table->text("PopupLink");
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
        Schema::dropIfExists('ProtfolioContents');
    }
};
