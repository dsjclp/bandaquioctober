<?php namespace PapangProduction\Strawpoll\Models;

use Model;
use Settings;

class StrawpollSettings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'papangproduction_strawpoll_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
    
    const STRAWPOLL_MODE = '0';
    
    public function initSettingsData()
    {
        $this->strawpoll_mode = '0';
    }
    
    public function getModeAttribute($value)
    {
        if (!$value) {
            return self::STRAWPOLL_MODE;
        }

        return $value;
    }
}
