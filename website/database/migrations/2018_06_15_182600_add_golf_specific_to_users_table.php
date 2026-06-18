<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGolfSpecificToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('version')->default(1)->unsigned()->after('id');
            $table->enum('gender', ['Not supplied', 'Male', 'Female', 'Other'])->default('Not supplied');
            $table->text('web_url')->nullable();
            $table->date('dob')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->dateTime('last_played_at')->nullable();
            $table->float('amg_handicap', 5, 2)->default(28);
            $table->float('official_handicap', 5, 2)->nullable();

            $table->tinyInteger('dummy')->default(0)->unsigned();
            $table->smallInteger('num_rounds')->default(0)->unsigned();
            $table->smallInteger('num_complete')->default(0)->unsigned();
            $table->smallInteger('num_fairways')->default(0)->unsigned();
            $table->smallInteger('num_girs')->default(0)->unsigned();
            $table->smallInteger('num_sand_saves')->default(0)->unsigned();
            $table->smallInteger('num_putts')->default(0)->unsigned();
            $table->mediumInteger('num_strokes')->default(0)->unsigned();
            $table->smallInteger('num_logins')->default(0)->unsigned();

            $table->dateTime('last_login_fail_at')->nullable();
            $table->smallInteger('num_login_fails')->default(0)->unsigned();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('version');
            $table->dropColumn('gender');
            $table->dropColumn('web_url');
            $table->dropColumn('dob');
            $table->dropColumn('last_login_at');
            $table->dropColumn('last_played_at');
            $table->dropColumn('amg_handicap');
            $table->dropColumn('official_handicap');

            $table->dropColumn('dummy');
            $table->dropColumn('num_rounds');
            $table->dropColumn('num_complete');
            $table->dropColumn('num_fairways');
            $table->dropColumn('num_girs');
            $table->dropColumn('num_sand_saves');
            $table->dropColumn('num_putts');
            $table->dropColumn('num_strokes');
            $table->dropColumn('num_logins');

            $table->dropColumn('last_login_fail_at');
            $table->dropColumn('num_login_fails');
            $table->dropColumn('deleted_at');
        });
    }
}
