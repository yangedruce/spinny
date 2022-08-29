<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('shared')->nullable()->default(null);
            $table->timestamps();
            
            $table->foreignId('code_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('prize_id')
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
        Schema::table('winners', function (Blueprint $table) {
            $table->dropForeign(['code_id']);
            $table->dropForeign(['prize_id']);
        });

        Schema::dropIfExists('winners');
    }
}
