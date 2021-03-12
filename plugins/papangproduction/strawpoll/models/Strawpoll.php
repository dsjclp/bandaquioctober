<?php namespace PapangProduction\Strawpoll\Models;

use Model;
use Carbon\Carbon;
use Lang;
use ValidationException;
use PapangProduction\Strawpoll\Models\StrawpollSettings;

/**
 * Model
 */
class Strawpoll extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'papangproduction_strawpoll_strawpolls';

    /*
     * Validation
     */
    public $rules = [
        'name'   => 'required|between:1,100',
        'slug'    => ['between:1,100', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i'],
        'description' => 'required',
        'status'  => 'required|in:draft,published,disabled',
        'view_mode' => 'required|between:1,2|numeric'
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = true;
    
    protected $dates = ['published_at','published_end'];
    
    protected $fillable = [
        'name',
        'description',
        'published_at',
        'published_end'
    ];
    
    /**
     * @var array Relations
     */
    public $hasMany = ['strawpoll_choices' => 'PapangProduction\Strawpoll\Models\StrawpollChoice', 'strawpoll_votes' => 'PapangProduction\Strawpoll\Models\StrawpollVote'];
    public $belongsTo = ['user' => ['Backend\Models\User']];
    
    public function filterFields($fields, $context = null){
        
        // 0 = conf
        if ($this->status == 'draft' || $this->status == '') {
            if (StrawpollSettings::get('strawpoll_mode') != '0') {
                $fields->mode->hidden = true;
            }
        }
        
        if($context == 'update' &&  $this->status != 'draft') {
            $fields->name->disabled = true;
            $fields->slug->disabled = true;
            $fields->description->disabled = true;
            $fields->strawpoll_choices->hidden = true;
            $fields->mode->hidden = true;
        }
    }
    
    public function getVotesArray() {
        $strawpoll_votes = array();
        foreach($this->strawpoll_choices  as $strawpollChoice)
        {
            $strawpoll_votes[] = array("key" => $strawpollChoice->name, "y" => $strawpollChoice->strawpoll_votes->count());
        }
        return json_encode($strawpoll_votes);
    }
    
    public function getChoicesColorArray() {
        $choicesColorArray = array();
        foreach($this->strawpoll_choices  as $strawpollChoice)
        {
            $choicesColorArray[] = "'".$strawpollChoice->color."'";
        }
        return $choicesColorArray;
    }
    
    public function beforeCreate()
    {
        //0: conf
        if (StrawpollSettings::get('strawpoll_mode') != '0') {
            $this->mode = StrawpollSettings::get('strawpoll_mode');
        }
        
        if ($this->published_at == '' && $this->status == 'published') {
            $this->published_at = new Carbon;
        }
        if ($this->published_end == '') {
            $this->published_end = null;
        }
    }
    
    public function getChartAttributes(){
    
        $attributes = array();
        
        if ($this->view_mode == 1){
            $attributes['class'] = 'control-chart wrap-legend';
            $attributes['data-control'] = 'chart-pie';
            $attributes['data-size'] = '200';
            $attributes['data-center-text'] = '100';
        } else if ($this->view_mode == 2){
            $attributes['class'] = 'control-chart wrap-legend';
            $attributes['data-control'] = 'chart-bar';
            $attributes['data-height'] = '100';
            $attributes['data-full-width'] = '1';
        }
        
        return $attributes;
    }
    
    public function beforeUpdate(){
        $databaseModel = Strawpoll::find($this->id);
        
        if($databaseModel->status == 'published' && $this->status == 'draft' && $this->strawpoll_votes()->count() > 0){
            throw new ValidationException([
               'status' => Lang::get('papangproduction.strawpoll::lang.strawpoll.has_votes_error_to_draft')
            ]);
        }
        
        if(($databaseModel->status == 'draft' ||  $databaseModel->status == 'disabled') && $this->status == 'published' && $this->published_at == '') {
            $this->published_at = new Carbon;
        }
    }
    
    public function beforeDelete()
    {
        $this->strawpoll_choices() && $this->strawpoll_choices()->delete();
        $this->strawpoll_votes() && $this->strawpoll_votes()->delete();
    }
    
    public function isAnonymous(){
        return $this->mode == '1' ? true : false;
    }
}