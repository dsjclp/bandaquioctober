<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDlpEventsPartitionsGenres extends Migration
{
    public function up()
    {
        Schema::create('dlp_events_partitions_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('partition_id');
            $table->integer('genre_id');
            $table->primary(['partition_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dlp_events_partitions_genres');
    }
}
