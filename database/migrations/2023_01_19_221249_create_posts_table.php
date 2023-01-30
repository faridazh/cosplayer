<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');;

            $table->string('cover');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->boolean('is_nsfw')->default(0);
            $table->boolean('is_hidden')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->json('social')->nullable();
            $table->json('shop')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
