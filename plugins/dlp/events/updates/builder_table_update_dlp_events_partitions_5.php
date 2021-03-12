<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsPartitions5 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_partitions', function($table)
        {
            $table->smallInteger('rank');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_partitions', function($table)
        {
            $table->dropColumn('rank');
        });
    }
}
