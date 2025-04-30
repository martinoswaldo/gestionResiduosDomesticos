<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeToCollectionTable extends Migration
{
    public function up()
    {
        Schema::table('collection', function (Blueprint $table) {
            $table->string('time')->after('scheduled_date');
        });
    }

    public function down()
    {
        Schema::table('collection', function (Blueprint $table) {
            $table->dropColumn('time');
        });
    }
}
