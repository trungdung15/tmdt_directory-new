<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->integer('is_admin')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('address');
            $table->dropColumn('phone_number');
            $table->dropColumn('gender');
            $table->dropColumn('birthday');
            $table->dropColumn('role_id');
            $table->dropSoftDeletes();
        });
    }
};
