<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');  //予約のid
            $table->datetime('reserve_start');  //予約の予約の開始時間
            $table->datetime('reserve_end');  //予約の予約の終了時間
            $table->enum('approval',['yes', 'no']);  //予約の承認
            $table->unsignedBigInteger('user_id');  //予約のuser ID
            $table->timestamps();  //生成時間
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
