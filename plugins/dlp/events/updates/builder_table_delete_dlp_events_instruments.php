<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteDlpEventsInstruments extends Migration
{
    public function up()
    {
        Schema::dropIfExists('dlp_events_instruments');
    }
    
    public function down()
    {
        Schema::create('dlp_events_instruments', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
        });
    }
}
