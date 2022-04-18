<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id')->comment('内部ID');
            $table->string('item_name', 80)->comment("品目名");
            $table->integer("unit_price")->nullable()->comment("単価A");
            $table->unsignedInteger('category_id')->comment('カテゴリーID');
            $table->timestamps();
            $table->softDeletes();
            // foreign keys
            $table->foreign('category_id')->references('id')->on('category_list');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
