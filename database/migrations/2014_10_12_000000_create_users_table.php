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
     //   Schema::create('users', function (Blueprint $table) {
      //      $table->id('UserID');
      //      $table->string('Nombre', 255);
        //    $table->string('Email', 255)->unique();
     //       $table->string('Contraseña', 255);
     //       $table->string('Rol', 50);
     //       $table->timestamps();
     //   });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
