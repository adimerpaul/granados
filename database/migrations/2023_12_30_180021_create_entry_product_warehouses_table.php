<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryProductWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_product_warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_id')->references('id')->on('works');
            $table->foreignId('product_id')->references('id')->on('works');
            $table->integer('quantity_entered');
            $table->date('date_of_admission');
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
        Schema::dropIfExists('entry_product_warehouses');
    }
}
