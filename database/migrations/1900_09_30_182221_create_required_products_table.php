<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('required_products', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('requirement_id')->references('id')->on('requirements');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->text('observation')->nullable();
            $table->string('status')->nullable();
            $table->integer('quantity');
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
        Schema::dropIfExists('required_products');
    }
}
