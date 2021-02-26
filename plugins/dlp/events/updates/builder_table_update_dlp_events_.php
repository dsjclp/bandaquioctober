<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEvents extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_', function($table)
        {
            $table->text('name')->nullable();
            $table->date('time_begin')->nullable();
            $table->date('time_end')->nullable();
            $table->text('location')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('time_begin');
            $table->dropColumn('time_end');
            $table->dropColumn('location');
        });
    }
}
