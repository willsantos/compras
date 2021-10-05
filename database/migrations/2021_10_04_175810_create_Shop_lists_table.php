<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopListsTable extends Migration
{

    public function up(): void
    {
        Schema::create('shop_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('shop_lists');
    }
}
