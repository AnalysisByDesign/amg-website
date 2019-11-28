<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSchemaTo56 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('announcements', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
        });


        Schema::table('api_tokens', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
        });

        Schema::table('team_subscriptions', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->change();
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
            $table->unsignedInteger('team_id')->nullable()->change();
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
            $table->unsignedInteger('created_by')->nullable()->change();
        });

        Schema::table('teams', function (Blueprint $table) {
             $table->unsignedInteger('owner_id')->change();
            $table->string('slug')->nullable()->unique();
        });

        Schema::table('team_users', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->change();
            $table->unsignedInteger('user_id')->change();
        });

        Schema::table('invitations', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->change();
            $table->unsignedInteger('user_id')->nullable()->change();
            $table->string('role')->nullable();
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
