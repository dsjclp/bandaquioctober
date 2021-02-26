<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsParticipations3 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_participations', function($table)
        {
            $table->integer('event');
            $table->integer('instrument');
            $table->dropColumn('event_id');
            $table->dropColumn('instrument_id');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_participations', function($table)
        {
            $table->dropColumn('event');
            $table->dropColumn('instrument');
            $table->integer('event_id');
            $table->integer('instrument_id');
        });
    }
}
