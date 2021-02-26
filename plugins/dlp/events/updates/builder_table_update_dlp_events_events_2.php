<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDlpEventsEvents2 extends Migration
{
    public function up()
    {
        Schema::table('dlp_events_events', function($table)
        {
            $table->integer('location_id')->nullable();
            $table->string('slug');
            $table->string('name', 65535)->nullable()->unsigned(false)->default(null)->change();
            $table->renameColumn('location', 'description');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
    }
    
    public function down()
    {
        Schema::table('dlp_events_events', function($table)
        {
            $table->dropColumn('location_id');
            $table->dropColumn('slug');
            $table->text('name')->nullable()->unsigned(false)->default(null)->change();
            $table->renameColumn('description', 'location');
            $table->decimal('latitude', 10, 0)->nullable();
            $table->decimal('longitude', 10, 0)->nullable();
        });
    }
}
