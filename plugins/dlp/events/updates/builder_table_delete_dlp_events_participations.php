<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteDlpEventsParticipations extends Migration
{
    public function up()
    {
        Schema::dropIfExists('dlp_events_participations');
    }
    
    public function down()
    {
        Schema::create('dlp_events_participations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->boolean('position')->nullable();
            $table->integer('user_id');
            $table->integer('event_id');
            $table->integer('instrument_id');
        });
    }
}
