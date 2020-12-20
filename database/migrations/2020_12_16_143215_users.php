<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('username_slug');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamp('last_login_at');
            $table->string('description')->default("selam ben");
            $table->string('image_url')->default("uploads/person-placeholder.jpg");
            $table->integer('popularity')->default(0);
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
}
