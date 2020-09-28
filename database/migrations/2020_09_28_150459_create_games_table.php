<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->tinyinteger("complete");
            $table->integer("winning_score")->default(21);
            $table->integer("change_server")->default(5);
            $table->string("player_1");
            $table->string("player_2");
            $table->integer('player_1_score')->default(0);
            $table->integer('player_2_score')->default(0);
            $table->timestamps();

            $table->foreignId("players_id")->unsigned();
            $table->foreign("players_id")->references("id")->on("players");
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
