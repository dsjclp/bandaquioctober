<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsLocations3 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_locations', function($table)
        {
            $table->decimal('latitude', 9, 4)->change();
            $table->decimal('longitude', 9, 4)->change();
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_locations', function($table)
        {
            $table->decimal('latitude', 10, 9)->change();
            $table->decimal('longitude', 10, 9)->change();
        });
    }
}
