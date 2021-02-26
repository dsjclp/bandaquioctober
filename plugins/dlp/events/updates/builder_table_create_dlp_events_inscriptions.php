<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDlpEventsInscriptions extends Migration
{
    public function up()
    {
        Schema::create('dlp_events_inscriptions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('event_id');
            $table->boolean('position');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dlp_events_inscriptions');
    }
}
