<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListItemsTable extends Migration
{

    public function up(): void
    {
        Schema::create('list_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('list_id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('list_id')->references('id')->on('shop_lists');
            $table->foreign('item_id')->references('id')->on('items');
            $table->boolean('status');
            $table->integer('priority');
            $table->timestamps();
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('list_items');
    }
}
