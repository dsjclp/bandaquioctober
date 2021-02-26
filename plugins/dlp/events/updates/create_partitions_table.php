<?php namespace Dlp\Events\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePartitionsTable extends Migration
{
    public function up()
    {
        Schema::create('dlp_events_partitions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dlp_events_partitions');
    }
}
