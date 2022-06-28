<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('mobiles', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("product_id")->unsigned();
            $table->integer("ram");
            $table->integer("camera");
            $table->timestamps();

            $table->foreign("product_id")->references("id")->on("products")
            ->onDelete("cascade")->onUpdate("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('mobiles');
    }
};
