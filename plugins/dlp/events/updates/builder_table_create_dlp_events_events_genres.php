<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDlpEventsEventsGenres extends Migration
{
    public function up()
    {
        Schema::create('dlp_events_events_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('event_id');
            $table->integer('genre_id');
            $table->primary(['event_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dlp_events_events_genres');
    }
}
