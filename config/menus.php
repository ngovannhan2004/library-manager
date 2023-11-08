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
        'title' => 'Category',
        'name' => 'category',
        'icon' => 'fa fa-list',
        'route' => 'admin.categories.index',
        'children' => [
            [
                'title' => 'List Category',
                'name' => 'index',
                'route' => 'admin.categories.index',
            ],
            [
                'title' => 'Create Category',
                'name' => 'create',
                'route' => 'admin.categories.create',
            ],
            [
                'title' => 'Edit Category',
                'name' => 'edit',
            ]

        ],
    ],
    [
        'title' => 'Publishing Company',
        'name' => 'Publishing-Company',
        'icon' => 'fa fa-list',
        'route' => 'admin.publishing_companies.index',
        'children' => [
            [
                'title' => 'List Publishing Company ',
                'name' => 'index',
                'route' => 'admin.publishing_companies.index',
            ],
            [
                'title' => 'Create publishing company',
                'name' => 'create',
                'route' => 'admin.publishing_companies.create',
            ],
            [
                'title' => 'Edit publishing Company',
                'name' => 'edit',
            ]

        ],
    ],
    [
        'title' => 'Author',
        'name' => 'author',
        'icon' => 'fa fa-list',
        'route' => 'admin.authors.index',
        'children' => [
            [
                'title' => 'List Category',
                'name' => 'index',
                'route' => 'admin.authors.index',
            ],
            [
                'title' => 'Create Category',
                'name' => 'create',
                'route' => 'admin.authors.create',
            ],
            [
                'title' => 'Edit Category',
                'name' => 'edit',
            ]

        ],
    ],
    [
        'title' => 'Status',
        'name' => 'status',
        'icon' => 'fa fa-list',
        'route' => 'admin.statuses.index',
        'children' => [
            [
                'title' => 'List Status',
                'name' => 'index',
                'route' => 'admin.statuses.index',
            ],
            [
                'title' => 'Create Status',
                'name' => 'create',
                'route' => 'admin.statuses.create',
            ],
            [
                'title' => 'Edit Status',
                'name' => 'edit',
            ]

        ],
    ],
    [
        'title' => 'Readers',
        'name' => 'readers',
        'icon' => 'fa fa-list',
        'route' => 'admin.readers.index',
        'children' => [
            [
                'title' => 'List Readers',
                'name' => 'index',
                'route' => 'admin.readers.index',
            ],
            [
                'title' => 'Create Readers',
                'name' => 'create',
                'route' => 'admin.readers.create',
            ],
            [
                'title' => 'Edit Readers',
                'name' => 'edit',
            ]

        ],
    ],    [
        'title' => 'Payment Slip',
        'name' => 'payment-slip',
        'icon' => 'fa fa-list',
        'route' => 'admin.payment_slips.index',
        'children' => [
            [
                'title' => 'List Payment Slip',
                'name' => 'index',
                'route' => 'admin.payment_slips.index',
            ],
            [
                'title' => 'Create Payment Slip',
                'name' => 'create',
                'route' => 'admin.payment_slips.create',
            ],
            [
                'title' => 'Edit Payment Slip',
                'name' => 'edit',
            ]

        ],
    ],

];
