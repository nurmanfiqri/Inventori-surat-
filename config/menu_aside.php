<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/home',
            'new-tab' => false,
        ],

        // Layout
        // [
        //     'section' => 'Layout',
        // ],
        [
            'title' => 'Master Data',
            'desc' => '',
            'icon' => 'media/svg/icons/Home/Commode2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Jasa',
                    'page' => 'md/jasa'
                ],
                [
                    'title' => 'Supplier',
                    'page' => 'md/supplier'
                ],
                [
                    'title' => 'Tipe',
                    'page' => 'md/tipe'
                ],
            ]
        ],
        [
            'title' => 'Report',
            'desc' => '',
            'icon' => 'media/svg/icons/Design/Bucket.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Rs Transaksi',
                    'page' => 'report/rs-transaksi'
                ]
            ]
        ],
        [
            'title' => 'Setting',
            'desc' => '',
            'icon' => 'media/svg/icons/General/Settings-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Product',
                    'page' => 'setting/product'
                ]
            ]
        ], 
        [
            'title' => 'Logout',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/auth/logout',
            'new-tab' => false,
        ],
    ]

];
