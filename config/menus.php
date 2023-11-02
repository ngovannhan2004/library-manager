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
    [
        'title' => 'Đầu Sách',
        'name' => 'dau_sach',
        'icon' => 'fa fa-list',
        'route' => 'admin.dausachs.index',
        'children' => [
            [
                'title' => 'List Đầu Sách',
                'name' => 'index',
                'route' => 'admin.dausachs.index',
            ],
            [
                'title' => 'CreateĐầu Sách',
                'name' => 'create',
                'route' => 'admin.dausachs.create',
            ],
            [
                'title' => 'Edit Đầu Sách',
                'name' => 'edit',
            ]
        ],
    ],

];
