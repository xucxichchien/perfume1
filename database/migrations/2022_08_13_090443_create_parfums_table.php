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
        Schema::create('parfums', function (Blueprint $table) {
            $table->id();
            $table->string('prodName');
            $table->float('prodPrice');
            $table->text('prodDes');
            $table->file('prodImage');
            $table->int('categoryID');
            $table->int('brandID');
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
        Schema::dropIfExists('parfums');
    }
};
