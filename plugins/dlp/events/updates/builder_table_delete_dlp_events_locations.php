<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteDlpEventsLocations extends Migration
{
    public function up()
    {
        Schema::dropIfExists('dlp_events_locations');
    }
    
    public function down()
    {
        Schema::create('dlp_events_locations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 191);
            $table->decimal('latitude', 10, 0);
            $table->decimal('longitude', 10, 0);
            $table->text('description')->nullable();
            $table->string('slug', 191);
        });
    }
}
