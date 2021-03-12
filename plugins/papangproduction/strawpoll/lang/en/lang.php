<?php return [
    'plugin' => [
        'name' => 'Strawpoll',
        'description' => 'Plugin that permit to manage polls',
    ],
    'permission' => [
        'manage_strawpoll' => 'Manage strawpolls',
    ],
    'strawpolls' => [
        'menu_label' => 'Strawpolls',
        'name' => 'strawpoll',
        'strawpolls_in_progress' => 'Strawpolls in progress',
        'delete_selected_success' => 'Successfully deleted the selected strawpolls',
        'delete_selected_empty' => 'There are no selected strawpolls to delete.'
    ],
    'strawpoll' => [
        'name' => 'Name',
        'slug' => 'Slug',
        'mode' => 'Mode',
        'description' => 'Description',
        'status' => 'State',
        'created_at' => 'Created at',
        'updated_at' => 'Edited le',
        'manage_strawpolls' => 'Manage the strawpolls',
        'draft' => 'Draft',
        'published' => 'Published',
        'disabled' => 'Disabled',
        'published_at' => 'Published on',
        'published_end' => 'Published end',
        'view_type' => 'Graph type',
        'view_mode' => [
            'pie_chart' => 'Pie chart',
            'bar_chart' => 'Bar chart'
        ],
        'noVote' => 'There are no votes for this strawpoll yet',
        'has_votes_error_to_draft' => 'Operation aborted : This strawpoll already contains votes. Cannot pass to draft status'
    ],
    'strawpollChoice' => [
        'name' => 'Name',
        'description' => 'Description',
        'color' => 'Color',
    ],
    'strawpollComponent' => [
        'name' => 'Strawpoll Component',
        'description' => 'Component that displays a list of polls',
        'submit' => 'Vote',
        'confirm' => 'Confirm the vote?',
        'noStrawpolls' => 'There are no strawpolls for the moment.',
        'noVote' => 'There are no votes for this strawpoll yet',
    ],
    'utils' => [
        'delete_selected' => 'Delete sélected',
        'delete_selected_confirm' => 'Delete this strawpoll?'
    ],
    'settings' => [
        'label' => 'Strawpolls',
        'description' => 'Manage strawpolls',
        'category' => 'Strawpolls',
        'strawpollMode' => 'Strawpoll mode',
        'anonymous' => 'Anonymous',
        'public' => 'Public',
        'configurable' => 'Configurable'
    ],
    'view' => [
        'current_strawpolls' => 'Opened strawpolls',
        'ended_strawpolls' => 'Ended strawpolls',
        'no_current_strawpolls' => 'There are not opened strawpoll for this moment.',
        'no_ended_strawpolls' => 'There are not ended strawpolls for this moment.',
        'end_strawpoll' => 'End of strawpoll:',
        'no_votes' => 'There are not votes for this strawpoll'
    ]
];