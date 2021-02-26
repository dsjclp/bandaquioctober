<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEvents2 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_', function($table)
        {
            $table->decimal('latitude', 10, 0)->nullable();
            $table->decimal('longitude', 10, 0)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_', function($table)
        {
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
    }
}
