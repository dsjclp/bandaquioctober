<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDlpEventsInstrumentsUsers extends Migration
{
    public function up()
    {
        Schema::create('dlp_events_instruments_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('instrument_id');
            $table->integer('user_id');
            $table->primary(['instrument_id','user_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dlp_events_instruments_users');
    }
}
