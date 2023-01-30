<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cosplayers', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->json('social')->nullable();
            $table->json('shop')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cosplayers');
    }
};
