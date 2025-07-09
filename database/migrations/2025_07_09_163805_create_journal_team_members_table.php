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
        Schema::create('journal_team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('designation');
            $table->string('image')->nullable();
            $table->string('email', 150)->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->default(1)->comment('1=Active,0=Inactive');
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
        Schema::dropIfExists('journal_team_members');
    }
};
