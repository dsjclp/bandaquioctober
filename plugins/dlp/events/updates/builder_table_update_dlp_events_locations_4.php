<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsLocations4 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_locations', function($table)
        {
            $table->integer('postal_code');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_locations', function($table)
        {
            $table->dropColumn('postal_code');
        });
    }
}
