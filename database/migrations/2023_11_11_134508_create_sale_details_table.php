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
    //    Schema::create('saledetails', function (Blueprint $table) {
    //        $table->id('SaleDetailID');
      //      $table->foreignId('SaleID')->constrained('sales');
     //       $table->foreignId('ProductID')->constrained('products');
    //        $table->integer('Cantidad');
    //        $table->decimal('Precio', 10, 2);
     //       $table->timestamps();
   //     });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saledetails');
    }
};
