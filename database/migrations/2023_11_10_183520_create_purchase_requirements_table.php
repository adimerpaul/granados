<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requirement_id')->references('id')->on('requirements');
            $table->foreignId('required_product_id')->references('id')->on('required_products');
            $table->integer('quantity');
            $table->float('cost_price')->nullable();
            $table->float('amount')->nullable();
            $table->string('status')->nullable();
            $table->integer('quantity_entered_into_the_warehouse')->nullable();
            $table->integer('quantity_entered_into_the_inventory')->default(0);
            $table->string('observation')->nullable();
            $table->foreignId('purchase_order_id')->references('id')->on('purchase_orders');
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
        Schema::dropIfExists('purchase_requirements');
    }
}
