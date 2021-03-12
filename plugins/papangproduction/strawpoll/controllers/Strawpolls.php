<?php namespace PapangProduction\Strawpoll\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use PapangProduction\Strawpoll\Models\Strawpoll;
use Flash;
use Lang;

class Strawpolls extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController', 'Backend.Behaviors.RelationController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_strawpoll_choice_relation.yaml';
    
    public $bodyClass = 'compact-container';

    public $requiredPermissions = [
        'papangproduction.strawpoll.manage_strawpoll' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('PapangProduction.Strawpoll', 'strawpoll');
    }
    
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $strawpollId) {
                if (!$strawpoll = Strawpoll::find($strawpollId)) {
                    continue;
                }
                $strawpoll->delete();
            }

            Flash::success(Lang::get('papangproduction.strawpoll::lang.strawpolls.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('papangproduction.strawpoll::lang.strawpolls.delete_selected_empty'));
        }

        return $this->listRefresh();
    }
}