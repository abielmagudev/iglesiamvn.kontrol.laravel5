<?php 

return array(
    [
        'route' => 'dashboard.index',
        'label' => 'Escritorio'
    ],
    [
        'route' => 'members.index',
        'label' => 'Miembros',
        'submenu' => array(
            [
                'route' => 'members.create',
                'label' => 'Nuevo miembro',
            ]
        ),
    ],
    [
        'route' => 'ministries.index',
        'label' => 'Ministerios',
        'submenu' => array(
            [
                'route' => 'ministries.create',
                'label' => 'Nuevo ministerio',
            ]
        ),
    ],
    [
        'route' => 'visits.index',
        'label' => 'Visitantes',
        'submenu' => array(
            [
                'route' => 'visits.create',
                'label' => 'Nueva visita',
            ]
        ),
    ],
    [
        'route' => 'users.index',
        'label' => 'Usuarios',
        'submenu' => array(
            [
                'route' => 'users.create',
                'label' => 'Nuevo usuario',
            ]
        ),
    ],
);