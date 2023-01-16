<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('web_statistics', function (Blueprint $table) {
            $table->id();

            $table->string('attribute')->unique();
            $table->bigInteger('value')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('web_statistics');
    }
};
