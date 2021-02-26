<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsEvents3 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_events', function($table)
        {
            $table->dropColumn('location_id');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_events', function($table)
        {
            $table->integer('location_id')->nullable();
        });
    }
}
