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
            //���[�UID�̐ݒ�
            $table->integer('user_id')->unsigned();
            //���[�UID��users�e�[�u���̎�L�[�ƕR�Â���
            $table->foreign('user_id')->references('id')->on('users');
            //�o�������ꏊ�̖��O
            $table->string('place_name');
            //�R�����g
            $table->string('place_comment');
            //�ܓx
            $table->double('ido');
            //�o�x
            $table->double('keido');
            //�O�o��������
            $table->date('place_date');
            //�摜�̖��O
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
