<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsPartitions4 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_partitions', function($table)
        {
            $table->renameColumn('category', 'serie');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_partitions', function($table)
        {
            $table->renameColumn('serie', 'category');
        });
    }
}
