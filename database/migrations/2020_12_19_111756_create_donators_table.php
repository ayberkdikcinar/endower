<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donators', function (Blueprint $table) {
            $table->id();

            $table->string('phone')->nullable(false)->unique();
            $table->string('email')->nullable(false)->unique();
            $table->string('name')->nullable(false);
            $table->string('card_name');
            $table->string('card_no');
            $table->string('card_ex_date');
            $table->string('card_cvc');

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
        Schema::dropIfExists('donators');
    }
}
