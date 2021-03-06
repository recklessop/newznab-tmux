<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleExpirationEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_expiration_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id')->unique();
            $table->timestamps();
            $table->boolean('day')->default(false);
            $table->boolean('week')->default(false);
            $table->boolean('month')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_expiration_emails');
    }
}
