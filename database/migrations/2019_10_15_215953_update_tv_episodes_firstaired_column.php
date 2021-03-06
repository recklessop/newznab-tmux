<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTvEpisodesFirstairedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tv_episodes', function (Blueprint $table) {
            $table->date('firstaired')->nullable()->comment('Date of original airing/release.')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tv_episodes', function (Blueprint $table) {
            $table->date('firstaired')->comment('Date of original airing/release.')->change();
        });
    }
}
