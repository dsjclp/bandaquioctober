<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsLocations extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_locations', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_locations', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
