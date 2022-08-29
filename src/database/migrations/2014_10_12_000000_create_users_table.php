<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('user_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('twitter_name', 1000)->nullable();
            $table->string('twitter_icon', 1000)->nullable();
            $table->string('twitter_access_token', 1000)->nullable();
            $table->string('line_name', 1000)->nullable();
            $table->string('line_id', 1000)->nullable();
            $table->string('line_icon', 1000)->nullable();
            $table->string('google_name', 100)->nullable();
            $table->string('google_id', 1000)->nullable();
            $table->string('self_introduction', 1000)->nullable();
            $table->date('birthday')->nullable();
            $table->string('sports', 100)->nullable();
            $table->integer('user_kind')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->boolean('exist')->nullable()->storedAs('case when deleted_at is null then 1 else null end');

            $table->unique(['email', 'exist']);
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
