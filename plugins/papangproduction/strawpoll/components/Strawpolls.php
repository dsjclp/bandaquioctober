<?php namespace PapangProduction\Strawpoll\Components;

use Auth;
use Cms\Classes\ComponentBase;
use PapangProduction\Strawpoll\Models\Strawpoll as StrawpollModel;
use PapangProduction\Strawpoll\Models\StrawpollChoice as StrawpollChoiceModel;
use PapangProduction\Strawpoll\Models\StrawpollVote as StrawpollVoteModel;
use RainLab\User\Models\user as UserModel;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class Strawpolls extends ComponentBase {

    public $strawpolls;
    public $strawpoll;
    public $publishedStrawpolls;
    public $finishedStrawpolls;

    public function componentDetails() {
        return [
            'name' => 'papangproduction.strawpoll::lang.strawpollComponent.name',
            'description' => 'papangproduction.strawpoll::lang.strawpollComponent.description'
        ];
    }

    public function defineProperties() {
        return [];
    }

    public function onRun() {
        // Injection
        $this->addJs('/modules/system/assets/ui/vendor/raphael/raphael.js');
        $this->addJs('/modules/system/assets/ui/js/chart.utils.js');
        $this->addJs('/modules/system/assets/ui/js/chart.pie.js');
        $this->addJs('/modules/system/assets/ui/js/chart.bar.js');
        $this->addCss('/plugins/papangproduction/strawpoll/assets/css/storm-chart.css');
        $this->addCss('/plugins/papangproduction/strawpoll/assets/css/style.css');
        
        
        $this->strawpolls = $this->page['strawpolls'] = $this->loadStrawpolls();  
        $this->strawpoll = $this->page['strawpoll'] = $this->strawpolls->first();
        
        $this->publishedStrawpolls = $this->page['publishedStrawpolls'] = $this->loadPublishedStrawpolls();
        $this->finishedStrawpolls = $this->page['finishedStrawpolls'] = $this->loadFinishedStrawpolls();
    }

    protected function loadStrawpolls() {
        $strawpolls = StrawpollModel::all();
        return $strawpolls;
    }
    
    protected function loadPublishedStrawpolls() {
        
        $strawpolls = StrawpollModel::where('status', 'published')
                        ->where(function($query){
                            $query->where('published_at', '<=', Carbon::now())
                                ->where(function($query2){
                                    $query2->whereNull('published_end')
                                        ->orWhere('published_end','>=', Carbon::now());
                                });
                            })
                        ->get();
                        
        return $strawpolls;
    }
    
    public function loadFinishedStrawpolls() {
        $finishedStrawpolls = StrawpollModel::where('status', 'published')->where('published_end','<',Carbon::now())->get();
        return $finishedStrawpolls;
    }

    public function onUserVoted() {
        if (post('choice') != null) {
            $strawpoll = StrawpollModel::where('id', post('strawpollId'))->first();
            $strawpollChoice = StrawpollChoiceModel::where('id', post('choice'))->first();
            $user = UserModel::find(Auth::getUser()->id);
            $newStrawpollVote = new StrawpollVoteModel();
            if(!$strawpoll->isAnonymous()){
                $newStrawpollVote->strawpoll_choice = $strawpollChoice;
            }
            $strawpollChoice->appended_count = $strawpollChoice->appended_count + 1;
            $strawpollChoice->save();
            $newStrawpollVote->strawpoll = $strawpoll;
            $newStrawpollVote->user = $user;
            $newStrawpollVote->save();
        }
        $this->onStrawpollSelected();
        $this->page['strawpoll'] = $this->strawpoll;
    }

    public function onStrawpollSelected() {
        $this->strawpoll = StrawpollModel::where('id', post('strawpollId'))->first();
        
        if(Auth::check() && (($this->strawpoll->published_end >= Carbon::now()) || ($this->strawpoll->published_end == null) )) {
            $this->page['can_vote'] = UserModel::find(Auth::getUser()->id)->canVote($this->strawpoll->id);
        } else {
            $this->page['can_vote'] = false;
        }
    }

}
