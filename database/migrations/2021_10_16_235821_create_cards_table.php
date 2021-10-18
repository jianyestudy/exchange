<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->comment('代理id');
            $table->string('card_number', 50)->comment("卡号")->index();
            $table->string('card_password', 50)->comment("密码");
            $table->string('phone',11)->comment("手机号码")->nullable();
            $table->dateTime('use_time')->comment("兑换时间")->nullable();
            $table->boolean('is_use')->comment('状态 是否使用')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE cards comment "卡号表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
