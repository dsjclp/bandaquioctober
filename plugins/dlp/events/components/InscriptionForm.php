<?php namespace Dlp\Events\Components;

use Cms\Classes\ComponentBase;
use Input;
use Validator;
use Redirect;
use Dlp\Events\Models\Inscription;
use Dlp\Events\Models\Genre;
use Dlp\Events\Models\Instrument;
use Dlp\Events\Models\Event;
use Rainlab\User\Models\User;
use Flash;


class InscriptionForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Inscription Form',
            'description' => 'Inscription form'
        ];
    }


    public function loadInstruments()
    {
        $query = Instrument::all();
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

    public function loadEvents()
    {
        $query = Event::all();
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

    public function loadUsers()
    {
        $query = User::all();
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

    public function onSend(){

        $validator = Validator::make(
            [
                'position' => Input::get('position'),
            ],
            [
                'position' => 'required',
            ]
        );

        if ($validator->fails())
        {                     
            return ['#result' => $this->renderPartial(
                'inscriptionform::messages',
                ['errorMsgs' => $validator->messages()->all()
                ])];   
        }
        else 
        {
            // These variables are available inside the message as Twig
            $vars = ['name' =>  Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content')];

            /*
            Mail::send('dlp.contact::mail.message', $vars, function($message) {

                $message->to('contact@bandaqui.fr', 'Admin');
                $message->subject('Nouveau message reçu');

            });
            */

            $inscription = new Inscription();
            $inscription->event = Input::get('event');
            $inscription->user = Input::get('user');
            $inscription->instrument = Input::get('instrument');
            $inscription->position = Input::get('position');
            $inscription->save();
            //Flash::success('Inscription enregistrée, merci !');
            //return Redirect::back();
  
            $absences = Inscription::where('event_id', '=', Input::get('event'))->where('position', '=', '0')->get();
            $absencescount = $absences->countBy('instrument_id');
            $absencescount = $absencescount->map(function ($item, $key) {
                $instrument = Instrument::find($key);
                $key = $instrument->name;
                return $item . ' en '.$key;
            });

            $presences = Inscription::where('event_id', '=', Input::get('event'))->where('position', '=', '1')->get();
            $presencescount = $presences->countBy('instrument_id');
            $presencescount = $presencescount->map(function ($item, $key) {
                $instrument = Instrument::find($key);
                $key = $instrument->name;
                return $item . ' en '.$key;
            });
        

            return ['#result' => $this->renderPartial(
                'inscriptionform::update',
                [
                    'absencescount' => $absencescount,
                    'presencescount' => $presencescount,
                ]
            )]; 
        }

    }

}
