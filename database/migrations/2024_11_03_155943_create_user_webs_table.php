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
        Schema::create('user_web', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->string('name', 100);
            $table->string('phone')->nullable();
            $table->string('username', 150);
            $table->string('email', 150);
            $table->string('password');
            $table->string('image')->nullable();
            $table->integer('status')->default(1)->comment('1=Active, 0=InActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_web');
    }
};
