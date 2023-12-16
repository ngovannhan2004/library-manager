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
        'title' => 'Book',
        'name' => 'book',
        'icon' => 'fa fa-list',
        'route' => 'admin.books.index',
        'children' => [
            [
                'title' => 'List Book',
                'name' => 'index',
                'route' => 'admin.books.index',
            ],
            [
                'title' => 'Create Book',
                'name' => 'create',
                'route' => 'admin.books.create',
            ],
            [
                'title' => 'Edit Book',
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
        'title' => 'Reader',
        'name' => 'readers',
        'icon' => 'fa fa-list',
        'route' => 'admin.readers.index',
        'children' => [
            [
                'title' => 'List Reader',
                'name' => 'index',
                'route' => 'admin.readers.index',
            ],
            [
                'title' => 'Create Reader',
                'name' => 'create',
                'route' => 'admin.readers.create',
            ],
            [
                'title' => 'Edit Reader',
                'name' => 'edit',
            ]

        ],
    ],

    [
        'title' => 'Condition',
        'name' => 'condition',
        'icon' => 'fa fa-list',
        'route' => 'admin.conditions.index',
        'children' => [
            [
                'title' => 'List Condition',
                'name' => 'index',
                'route' => 'admin.conditions.index',
            ],
            [
                'title' => 'Create Condition',
                'name' => 'create',
                'route' => 'admin.conditions.create',
            ],
            [
                'title' => 'Edit Condition',
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
        'title' => 'Payment Slip',
        'name' => 'payment-slip',
        'icon' => 'fa fa-list',
        'route' => 'admin.books.index',
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
    ], [
        'title' => 'Loan Slip',
        'name' => 'loan-slip',
        'icon' => 'fa fa-list',
        'route' => 'admin.loan_slips.index',
        'children' => [
            [
                'title' => 'List Loan Slip',
                'name' => 'index',
                'route' => 'admin.loan_slips.index',
            ],
            [
                'title' => 'Create Loan Slip',
                'name' => 'create',
                'route' => 'admin.loan_slips.create',
            ],
            [
                'title' => 'Edit Loan Slip',
                'name' => 'edit',
            ]

        ],
    ],
    [
        'title' => 'Statistic',
        'name' => 'statistic',
        'icon' => 'fa fa-list',
        'route' => 'admin.statistics.index',
        'children' => [
            [
                'title' => 'Statistic',
                'name' => 'index',
                'route' => 'admin.statistics.index',
            ],

        ],
    ],

];

