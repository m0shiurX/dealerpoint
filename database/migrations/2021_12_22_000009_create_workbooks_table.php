<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkbooksTable extends Migration
{
    public function up()
    {
        Schema::create('workbooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('unit_price', 15, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('returned_quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
