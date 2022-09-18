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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('emri');
            $table->string('mbiemri');
            $table->date('dataLindjes');
            $table->string('universiteti');
            $table->string('gjinia');
            $table->string('numriTel')->default('');
            $table->string('rruga')->default('');
            $table->string('verifikuar')->default('jo');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('img');
            $table->string('role', length: 15)->default('user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
