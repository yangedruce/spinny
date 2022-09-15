<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizeWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_winners', function (Blueprint $table) {
            $table->id();
            $table->boolean('shared')->nullable()->default(false);

            $table->foreignId('user_code_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('prize_id')
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
        Schema::table('prize_winners', function (Blueprint $table) {
            $table->dropForeign(['user_code_id']);
            $table->dropForeign(['prize_id']);
        });

        Schema::dropIfExists('prize_winners');
    }
}
