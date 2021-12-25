<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWorkbooksTable extends Migration
{
    public function up()
    {
        Schema::table('workbooks', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_5645839')->references('id')->on('products');
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id', 'agent_fk_5645840')->references('id')->on('agents');
        });
    }
}
