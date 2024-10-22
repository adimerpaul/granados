<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requirement_id')->references('id')->on('requirements');
            $table->foreignId('required_product_id')->references('id')->on('required_products');
            $table->foreignId('work_id')->references('id')->on('works');
            $table->integer('quantity');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('dispatch_requirements');
    }
}
