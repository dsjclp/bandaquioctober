<?php namespace PapangProduction\Strawpoll;

use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use Lang;
use Backend;
use RainLab\User\Controllers\Users as UserController;
use RainLab\User\Models\UserGroup as UserGroupModel;
use PapangProduction\Strawpoll\Models\Settings as StrawpollSettings;

class Plugin extends PluginBase
{
    
    //public $require = ['Rainlab.User'];
    
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'papangproduction.strawpoll::lang.plugin.name',
            'description' => 'papangproduction.strawpoll::lang.plugin.description',
            'author'      => 'PapangProduction',
            'icon'        => 'oc-icon-pie-chart'
        ];
    }
    
    public function registerComponents()
    {
        return [
            'PapangProduction\Strawpoll\Components\Strawpolls' => 'Strawpolls',
        ];
    }
    
    public function registerNavigation()
    {
        return [
            'strawpoll' => [
                'label'       => 'papangproduction.strawpoll::lang.plugin.name',
                'url'         => Backend::url('/papangproduction/strawpoll/strawpolls'),
                'icon'        => 'icon-pie-chart',
                'permissions' => ['papangproduction.strawpoll.manage_strawpoll'],
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'papangproduction.strawpoll.manage_strawpoll' => 
                ['tab' => 'papangproduction.strawpoll::lang.plugin.name', 
                 'label' => 'papangproduction.strawpoll::lang.permission.manage_strawpoll'],
        ];
    }
    
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'papangproduction.strawpoll::lang.settings.label',
                'description' => 'papangproduction.strawpoll::lang.settings.description',
                'category'    => 'papangproduction.strawpoll::lang.settings.category',
                'icon'        => 'icon-cog',
                'class'       => 'PapangProduction\Strawpoll\models\StrawpollSettings'
            ]
        ];
    }
    
    public function boot(){
        UserModel::extend(function($model){
            $model->hasMany['strawpoll_strawpolls'] = ['PapangProduction\Strawpoll\Models\Strawpoll'];
            $model->hasMany['strawpoll_votes'] = ['PapangProduction\Strawpoll\Models\StrawpollVote'];
            
            $model->addDynamicMethod('canVote', function($strawpoll_id) use ($model) {
                if($model->strawpoll_votes()->where('strawpoll_id', '=', $strawpoll_id)->count() > 0) {
                    return false;
                }
                return true;
            });
        });
    }
}
