<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->integer('source')->change();
        });
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('source', 'source_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('source_id', 'source');
        });
        Schema::table('news', function (Blueprint $table) {
            $table->string('source')->change();
        });
    }
}
