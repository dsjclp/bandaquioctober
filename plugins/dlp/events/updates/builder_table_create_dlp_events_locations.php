<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDlpEventsLocations extends Migration
{
    public function up()
    {
        Schema::create('dlp_events_locations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->decimal('latitude', 10, 0);
            $table->decimal('longitude', 10, 0);
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dlp_events_locations');
    }
}
