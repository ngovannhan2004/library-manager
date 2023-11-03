<?php
return [

    [
        'title' => 'User',
        'name' => 'user',
        'icon' => 'fa fa-list',
        'route' => 'admin.users.index',
        'children' => [
            [
                'title' => 'List User',
                'name' => 'index',
                'route' => 'admin.users.index',
            ],
            [
                'title' => 'Create User',
                'name' => 'create',
                'route' => 'admin.users.create',
            ],
            [
                'title' => 'Edit User',
                'name' => 'edit',
            ]
        ],
    ],


];
