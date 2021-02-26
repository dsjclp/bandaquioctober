<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsLocations2 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_locations', function($table)
        {
            $table->decimal('latitude', 10, 9)->change();
            $table->decimal('longitude', 10, 9)->change();
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_locations', function($table)
        {
            $table->decimal('latitude', 10, 0)->change();
            $table->decimal('longitude', 10, 0)->change();
        });
    }
}
