<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsParticipations extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_participations', function($table)
        {
            $table->integer('event');
            $table->integer('instrument');
            $table->integer('user');
            $table->boolean('position')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_participations', function($table)
        {
            $table->dropColumn('event');
            $table->dropColumn('instrument');
            $table->dropColumn('user');
            $table->dropColumn('position');
        });
    }
}
