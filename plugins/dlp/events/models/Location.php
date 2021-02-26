<?php namespace Dlp\Events\Models;

use Model;

/**
 * Model
 */
class Location extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dlp_events_locations';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /* Relations */

    public $attachOne = [
        'poster' => 'System\Models\File',
    ];

    public $belongsToMany = [

        'events' => 
        [
            'Dlp\Events\Models\Event',
            'table' => 'dlp_events_events_locations',
            'order' => 'name'
        ],

    ];
}
