<?php namespace Dlp\Events;

use System\Classes\PluginBase;
use Illuminate\Support\Carbon;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return[
            'Dlp\Events\Components\Inscriptions' => 'inscriptions',
            'Dlp\Events\Components\InscriptionForm' => 'inscriptionform',
            'Dlp\Events\Components\FilterEvents' => 'filterevents',
        ];
    }

    public function registerSettings()
    {
    }

    public function registerMarkupTags()
{
    return [
        'filters' => [
            'frenchDate' => function ($date_time, $format) {
                $carbon = new Carbon($date_time);
                setlocale(LC_ALL, 'French');

                return utf8_encode($carbon->formatLocalized($format));
            },
        ],
    ];
}

    public function boot()
{
    \Event::listen('offline.sitesearch.query', function ($query) {

});
}
}
