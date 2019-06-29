<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaishutsuKirokusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaishutsu_kirokus', function (Blueprint $table) {
            $table->increments('id');
            //ユーザIDの設定
            $table->integer('user_id')->unsigned();
            //ユーザIDをusersテーブルの主キーと紐づける
            $table->foreign('user_id')->references('id')->on('users');
            //出かけた場所の名前
            $table->string('place_name');
            //コメント
            $table->string('place_comment');
            //緯度
            $table->double('ido');
            //経度
            $table->double('keido');
            //外出した日時
            $table->date('place_date');
            //画像の名前
            $table->string('file_name');
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
        Schema::dropIfExists('gaishutsu_kirokus');
    }
}
