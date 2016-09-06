<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\User;

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
            $table->increments('id');
            $table->string('username', 30)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('is_admin')->default('no');
            $table->rememberToken();
            $table->timestamps();
        });

        /*
         * Create the default admin user. Not the best way to do it, but it works for now.
         */
        $user = new User;
        $user->username = "admin";
        $user->email = "youremail";
        $user->password = Hash::make('password');
        $user->is_admin = "yes";
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
