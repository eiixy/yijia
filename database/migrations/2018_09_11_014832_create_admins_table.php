<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('管理员账户');
            $table->string('password')->comment('管理员密码hash加密');
            $table->string('email')->comment('管理员邮箱');
            $table->string('tel')->comment('管理员联系电话');
            $table->tinyInteger('state')->default(1)->comment('用户状态：{0:禁用,1:正常}');
            $table->rememberToken()->comment('记住密码');
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
        Schema::dropIfExists('admins');
    }
}
