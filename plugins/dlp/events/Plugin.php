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

        // The controller is used to generate page URLs.
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

        // Search your plugin's contents
        $items = Models\Event
            ::where('name', 'like', "%${query}%")
            ->orWhere('description', 'like', "%${query}%")
            ->get();

        // Now build a results array
        $results = $items->map(function ($item) use ($query, $controller) {

            // If the query is found in the title, set a relevance of 2
            $relevance = mb_stripos($item->title, $query) !== false ? 2 : 1;
            
            // Optional: Add an age penalty to older results. This makes sure that
            // newer results are listed first.
            // if ($relevance > 1 && $item->created_at) {
            //    $ageInDays = $item->created_at->diffInDays(\Illuminate\Support\Carbon::now());
            //    $relevance -= \OFFLINE\SiteSearch\Classes\Providers\ResultsProvider::agePenaltyForDays($ageInDays);
            // }

            if($item->poster)
            {
                return [
                    'title'     => $item->name,
                    'text'      => $item->description,
                    'url'       => $controller->pageUrl('cms-page-file-name', ['slug' => $item->slug]),
                    'thumb'     => optional($item->poster)->first(), // Instance of System\Models\File
                    'relevance' => $relevance, // higher relevance results in a higher
                                                // position in the results listing
                    // 'meta' => 'data',       // optional, any other information you want
                                                // to associate with this result
                    // 'model' => $item,       // optional, pass along the original model
                ];
            }
            else
            {
                return [
                    'title'     => $item->name,
                    'text'      => $item->description,
                    'url'       => $controller->pageUrl('cms-page-file-name', ['slug' => $item->slug]),
                    //'thumb'     => optional($item->poster)->first(), // Instance of System\Models\File
                    'relevance' => $relevance, // higher relevance results in a higher
                                                // position in the results listing
                    // 'meta' => 'data',       // optional, any other information you want
                                                // to associate with this result
                    // 'model' => $item,       // optional, pass along the original model
                ];
            }
        });

        return [
            'provider' => 'Evenement', // The badge to display for this result
            'results'  => $results,
        ];
    });
}
}
