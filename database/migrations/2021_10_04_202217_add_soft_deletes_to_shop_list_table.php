<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToShopListTable extends Migration
{

    public function up(): void
    {
        Schema::table('shop_lists', function (Blueprint $table) {
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::table('shop_lists', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
