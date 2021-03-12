<?php return [
    'plugin' => [
        'name' => 'Sondage',
        'description' => 'Plugin permettant de de gérer des sondages',
    ],
    'permission' => [
        'manage_strawpoll' => 'Gérer les sondages',
    ],
    'strawpolls' => [
        'menu_label' => 'Sondages',
        'name' => 'Sondage',
        'strawpolls_in_progress' => 'Sondages en cours',
        'delete_selected_success' => 'Suppression de la sélection effectuée',
        'delete_selected_empty' => 'Suppression de la sélection impossible'
    ],
    'strawpoll' => [
        'name' => 'Nom',
        'slug' => 'Slug',
        'mode' => 'Mode',
        'description' => 'Description',
        'status' => 'Statut',
        'created_at' => 'Créé le',
        'updated_at' => 'Modifié le',
        'manage_strawpolls' => 'Gérer les sondages',
        'draft' => 'Brouillon',
        'published' => 'Publié',
        'disabled' => 'Désactivé',
        'published_at' => 'Publié le',
        'published_end' => 'Publié jusqu\'au',
        'view_type' => 'Type de graphe',
        'view_mode' => [
            'pie_chart' => 'Diagramme circulaire',
            'bar_chart' => 'Diagramme à bandes'
        ],
        'noVote' => 'Il n\'y a pas encore eu de votes pour ce sondage',
        'has_votes_error_to_draft' => 'Action impossible : ce sondage contient déjà des votes. Impossible de le passer en brouillon'
    ],
    'strawpollChoice' => [
        'name' => 'Nom',
        'description' => 'Description',
        'color' => 'Couleur',
    ],
    'strawpollComponent' => [
        'name' => 'Composant sondage',
        'description' => 'Composant permettant d\'afficher une liste de sondages',
        'submit' => 'Voter',
        'confirm' => 'Confirmer le vote ?',
        'noStrawpolls' => 'Il n\'y a pas de sondages pour le moment.',
        'noVote' => 'Il n\'y a pas encore eu de votes pour ce sondage',
    ],
    'utils' => [
        'delete_selected' => 'Supprimer sélection',
        'delete_selected_confirm' => 'Supprimer les sondages sélectionnés ?'
    ],
    'settings' => [
        'label' => 'Sondages',
        'description' => 'Description du paramètre sondages',
        'category' => 'Sondages',
        'strawpollMode' => 'Type de sondage',
        'anonymous' => 'Anonyme',
        'public' => 'Public',
        'configurable' => 'Configurable'
    ],
    'view' => [
        'current_strawpolls' => 'Sondages en cours',
        'ended_strawpolls' => 'Sondages terminés',
        'no_current_strawpolls' => 'Il n\'y a pas de sondages en cours pour le moment.',
        'no_ended_strawpolls' => 'Il n\'y a pas de sondages terminés pour le moment.',
        'end_strawpoll' => 'Fin du sondage :',
        'no_votes' => 'Il n\'y a pas encore eu de votes pour ce sondage'
    ]
];