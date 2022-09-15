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
            $table->integer('month');

            $table->foreignId('user_code_id')
                ->constrained()
                ->onDelete('cascade');
            
            $table->foreignId('prize_winner_id')
                ->constrained()
                ->onDelete('cascade');
            


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
        Schema::table('grand_prize_winners', function (Blueprint $table) {
            $table->dropForeign(['user_code_id']);
            $table->dropForeign(['prize_winner_id']);
        });

        Schema::dropIfExists('grand_prize_winners');
    }
}
