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
        Schema::create('user', function (Blueprint $table) {
            $table->increments("id"); //自動count欄位 AUTO_INCREAMENT primay key
            $table->string('name',50);
            $table->string('account',50)->unique(); //$table->string('account,50')->unique(); ->unique() 設為唯一直
            $table->string('password',60);  
            $table->tinyInteger("enabeld")->default('1');
            $table->string('remember_token',100)->nullable();
            $table->timestamps(); #會自動增加兩個欄位:created_at跟updated_at 
            //timestamp 時間戳記每次登陸會自動把更新或新建的時候塞進去
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
