<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsInscriptions2 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_inscriptions', function($table)
        {
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_inscriptions', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
