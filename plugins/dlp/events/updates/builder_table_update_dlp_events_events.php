<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsEvents extends Migration
{
    public function up()
    {
        Schema::rename('dlp_events_', 'dlp_events_events');
    }
    
    public function down()
    {
        Schema::rename('dlp_events_events', 'dlp_events_');
    }
}
