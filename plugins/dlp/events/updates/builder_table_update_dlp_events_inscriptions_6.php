<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsInscriptions6 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_inscriptions', function($table)
        {
            $table->boolean('position')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_inscriptions', function($table)
        {
            $table->boolean('position')->nullable(false)->change();
        });
    }
}
