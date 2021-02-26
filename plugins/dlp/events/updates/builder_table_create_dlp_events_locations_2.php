<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDlpEventsLocations2 extends Migration
{
    public function up()
    {
        Schema::create('dlp_events_locations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('latitude', 10, 0);
            $table->decimal('longitude', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dlp_events_locations');
    }
}
