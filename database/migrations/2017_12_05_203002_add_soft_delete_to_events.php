<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeleteToEvents extends Migration
{
    public function up()
    {
        Schema::table('events', function(Blueprint $table)
        {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('events', function(Blueprint $table)
        {
            $table->dropColumn('deleted_at');
        });
    }
}
