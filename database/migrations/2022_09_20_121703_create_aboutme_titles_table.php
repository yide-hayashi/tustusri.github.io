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
        Schema::create('AboutmeTitle', function (Blueprint $table) {
            $table->increments("AboutmeTitleid");
            $table->string("PageTitle",100);
            $table->text("PageSubtext");
            $table->unsignedInteger("Pid");
            $table->timestamps();
            $table->foreign("Pid")->references("Pid")->on("PageNames");
        });
        Schema::table('Histories', function (Blueprint $table) {
            $table->dropColumn("PageSubtext");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutme_titles');
    }
};
