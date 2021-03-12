<?php namespace PapangProduction\Strawpoll\Models;

use Model;

/**
 * Model
 */
class StrawpollChoice extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
        'name'   => 'required|between:1,100',
        'color' => 'required'
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = true;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'papangproduction_strawpoll_choices';
    
    /**
     * @var array Relations
     */
    public $hasMany = ['strawpoll_votes' => 'PapangProduction\Strawpoll\Models\StrawpollVote'];
    public $belongsTo = ['strawpoll' => 'PapangProduction\Strawpoll\Models\Strawpoll'];
    
    public function count() {
        if($this->strawpoll->isAnonymous()){
            return $this->appended_count;
        } else {
            return $this->strawpoll_votes()->count();
        }
    }
}