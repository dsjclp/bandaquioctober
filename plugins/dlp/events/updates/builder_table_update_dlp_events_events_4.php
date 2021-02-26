<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsEvents4 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_events', function($table)
        {
            $table->boolean('public');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_events', function($table)
        {
            $table->dropColumn('public');
        });
    }
}
