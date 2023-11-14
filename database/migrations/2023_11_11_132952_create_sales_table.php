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
   //    Schema::create('sales', function (Blueprint $table) {
    //        $table->id('SaleID');
    //        $table->foreignId('UserID')->constrained('users');
      //      $table->foreignId('CustomerID')->constrained('customers');
    //        $table->date('Fecha');
      //      $table->decimal('Total', 10, 2);
     //       $table->timestamps();
      //  });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
