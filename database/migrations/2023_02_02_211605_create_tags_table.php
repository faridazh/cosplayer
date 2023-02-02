<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('slug');
            $table->bigInteger('order')->default(0)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tags');
    }
};
