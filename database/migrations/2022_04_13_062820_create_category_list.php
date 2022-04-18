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
        Schema::create('category_list', function (Blueprint $table) {
            $table->increments('id')->comment('内部ID');
            $table->string("name")->comment("大カテゴリー名");
            $table->timestamps();
            $table->softDeletes(); // xoa mem
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_list');
    }
};
