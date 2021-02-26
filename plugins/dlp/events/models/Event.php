<?php namespace Dlp\Events\Models;

use Model;

/**
 * Model
 */
class Event extends Model
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
    public $table = 'dlp_events_events';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /* Relations */

    public $attachOne = [
        'poster' => 'System\Models\File',
    ];

    public $attachMany = [
        'gallery' => 'System\Models\File'
    ];

    public $hasMany = [
        'inscriptions' => 'Dlp\Events\Models\Inscription'
    ];

    public $belongsToMany = [

        'genres' => 
        [
            'Dlp\Events\Models\Genre',
            'table' => 'dlp_events_events_genres',
            'order' => 'genre_title'
        ],

        'locations' => 
        [
            'Dlp\Events\Models\Location',
            'table' => 'dlp_events_events_locations',
            'order' => 'name'
        ],

    ];

}
