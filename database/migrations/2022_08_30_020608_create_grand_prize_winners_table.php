<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrandPrizeWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grand_prize_winners', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('month');
            $table->timestamps();

            $table->foreignId('code_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grand_prize_winners', function (Blueprint $table) {
            $table->dropForeign(['code_id']);
        });

        Schema::dropIfExists('grand_prize_winners');
    }
}
