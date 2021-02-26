<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsParticipations2 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_participations', function($table)
        {
            $table->integer('event_id');
            $table->integer('instrument_id');
            $table->dropColumn('event');
            $table->dropColumn('instrument');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_participations', function($table)
        {
            $table->dropColumn('event_id');
            $table->dropColumn('instrument_id');
            $table->integer('event');
            $table->integer('instrument');
        });
    }
}
