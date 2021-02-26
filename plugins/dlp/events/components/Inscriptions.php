<?php namespace Dlp\Events\Components;

use Cms\Classes\ComponentBase;
use Dlp\Movies\Models\Inscription;

class Inscriptions extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Inscription list',
            'description' => 'Liste des inscriptions'
        ];
    }

    public function onRun()
    {
        $this->inscriptions = $this->loadInscriptions();
    }

    protected function loadInscriptions()
    {
        $query = Inscription::all();
        //return Actor::all()->take();
        if ($this->property('results') > 0){
            $query = $query->take($this->property('results'));
        }
        if ($this->property('sortOrder') == 'name asc'){
            $query = $query->sortBy('name');
        }
        if ($this->property('sortOrder') == 'name desc'){
            $query = $query->sortByDesc('name');
        }
        return $query;
    }

    public function defineProperties()
    {
        return [
            'results' => [
                'title' => 'Number of actors',
                'description' => 'How many actors do you want to display ?',
                'default' => 0,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only numbers allowed',
            ],
            'sortOrder' => [
                'title' => 'Sort actors',
                'description' => 'Sort those actors',
                'type' => 'dropdown',
                'default' => 'name asc'
            ]
        ];
    }

    public function getSortOrderOptions()
    {
        return [
            'name asc' => 'Name (ascending)',
            'name desc' => 'Name (descending)'
        ];
    }

    public $actors;
}
