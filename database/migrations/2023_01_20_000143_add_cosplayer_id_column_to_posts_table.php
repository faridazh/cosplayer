<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->bigInteger('cosplayer_id')->unsigned()->after('user_id');
            $table->foreign('cosplayer_id')->references('id')->on('cosplayers')->onDelete('cascade');

            $table->bigInteger('likes')->unsigned()->default(0)->after('shop');
            $table->bigInteger('dislikes')->unsigned()->default(0)->after('likes');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['cosplayer_id']);
            $table->dropColumn('cosplayer_id');
            $table->dropColumn('likes');
            $table->dropColumn('dislikes');
        });
    }
};
