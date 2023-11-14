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
     //   Schema::create('products', function (Blueprint $table) {
     //       $table->id('ProductID');
      //      $table->string('Nombre', 255);
      //      $table->text('Descripción');
      //      $table->decimal('Precio', 10, 2);
       //     $table->integer('Stock');
       //     $table->foreignId('CategoryID')->constrained('categories');
      //      $table->timestamps();
    //    });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
