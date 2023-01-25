<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cosplayers', function (Blueprint $table) {
            $table->bigInteger('stars')->unsigned()->default(0)->after('shop');
            $table->bigInteger('posts')->unsigned()->default(0)->after('stars');
        });
    }
    public function down()
    {
        Schema::table('cosplayers', function (Blueprint $table) {
            $table->dropColumn('stars');
            $table->dropColumn('posts');
        });
    }
};
