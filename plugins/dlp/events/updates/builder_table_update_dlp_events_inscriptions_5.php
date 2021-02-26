<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsInscriptions5 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_inscriptions', function($table)
        {
            $table->integer('instrument_id');
            $table->boolean('position');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_inscriptions', function($table)
        {
            $table->dropColumn('instrument_id');
            $table->dropColumn('position');
        });
    }
}
