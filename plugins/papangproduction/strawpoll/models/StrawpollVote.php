<?php namespace PapangProduction\Strawpoll\Models;

use Model;
use Carbon\Carbon;

/**
 * Model
 */
class StrawpollVote extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = true;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'papangproduction_strawpoll_votes';
    
    /**
     * @var array Relations
     */
    public $belongsTo = ['user' => 'Rainlab\User\Models\User', 'strawpoll_choice' => 'PapangProduction\Strawpoll\Models\StrawpollChoice', 'strawpoll' => 'PapangProduction\Strawpoll\Models\Strawpoll'];
    
    public function beforeSave() {
        if(($this->user AND $this->user->strawpoll_votes()->where('strawpoll_id', '=', $this->strawpoll->id)->count() > 0) OR
                ($this->strawpoll->published_end != null && $this->strawpoll->published_end < Carbon::now())) {
           exit;
        }
    }
}