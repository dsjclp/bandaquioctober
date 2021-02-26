<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDlpEventsEventsLocations extends Migration
{
    public function up()
    {
        Schema::create('dlp_events_events_locations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('event_id');
            $table->integer('location_id');
            $table->primary(['event_id','location_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dlp_events_events_locations');
    }
}
