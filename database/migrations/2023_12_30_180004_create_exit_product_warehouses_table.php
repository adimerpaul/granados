<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExitProductWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_product_warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_id')->references('id')->on('works');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->integer('quantity_removed_from_inventory');
            $table->date('departure_date');
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
        Schema::dropIfExists('exit_product_warehouses');
    }
}
