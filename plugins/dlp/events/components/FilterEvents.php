<?php namespace Dlp\Events\Components;

use Cms\Classes\ComponentBase;
use Dlp\Events\Models\Event;
use Dlp\Events\Models\Genre;
use Input;

class FilterEvents extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'FilterEvents Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->events = $this->filterEvents();
        $this->genres = Genre::all();
    }

    protected function filterEvents()
    {
        $name = Input::get('name');
        $genre = Input::get('genre');
        $query = Event::all();
        if($name)
        {
            $query = Event::where('name', '=', $name)->get();
        }
        if($genre)
        {
            $query = Event::whereHas('genres', function($filter) use ($genre)
            {
                $filter->where('slug', '=', $genre);
            })->get();
        }
        if($genre && $name)
        {
            $query = Event::whereHas('genres', function($filter) use ($genre)
            {
                $filter->where('slug', '=', $genre);
            })->where('name', '=', $name)->get();
        }
        //dd($query);
        return $query;
    }

    public $events;
    public $genres;
}
