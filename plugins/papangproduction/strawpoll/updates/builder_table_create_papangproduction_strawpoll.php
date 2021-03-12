<?php namespace PapangProduction\Strawpoll\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePapangProductionStrawpoll extends Migration
{
    public function up()
    {
        Schema::create('papangproduction_strawpoll_strawpolls', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('name')->nullable();
            $table->string('slug')->index();
            $table->text('description')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('published_end')->nullable();
            $table->enum('status', array('draft', 'published', 'disabled'));
            $table->string('view_mode',1)->default(1);
            $table->string('mode',1)->default(1); // 1 anonymous; 2: public
            $table->timestamps();
        });
        
        Schema::create('papangproduction_strawpoll_choices', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('strawpoll_id')->unsigned()->nullable()->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('color');
            $table->integer('appended_count')->unsigned()->default(0);
            $table->timestamps();
        });
        
        Schema::create('papangproduction_strawpoll_votes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned()->index();
            $table->integer('strawpoll_id')->unsigned()->index();
            $table->integer('strawpoll_choice_id')->unsigned()->index();
            $table->timestamps();
            $table->primary(['user_id', 'strawpoll_id','strawpoll_choice_id'], 'user_strawpoll_choice');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('papangproduction_strawpoll_votes');
        Schema::dropIfExists('papangproduction_strawpoll_choices');
        Schema::dropIfExists('papangproduction_strawpoll_strawpolls');
    }
}