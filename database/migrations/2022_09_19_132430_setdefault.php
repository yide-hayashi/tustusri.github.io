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
        Schema::table('ProtfolioContents', function (Blueprint $table) {
            $table->unsignedInteger("Pid")->default(2)->change();
            $table->text("ProtfolioContentImg")->default("")->change();
            
            $table->string("ProtfolioProjectName",100)->default("")->change();
            $table->text("ProtfolioProjectContent")->default("")->change();
            $table->text("PopupImg")->default("")->change();
            $table->string("PopupName",100)->default("")->change();
            $table->string("PopupSubtext",100)->default("")->change();
            $table->text("PopupContent")->default("")->change();
            $table->text("PopupLink")->default("")->change();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
