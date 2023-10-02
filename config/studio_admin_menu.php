<?php
// FONTOS!!! A pluginek mergelve kell, hogy betöltsék a saját studio_admin_menu.php-jukat!!!!!
return [
    'Studio' => [
        // Menü regisztrálása az adminba
        // Minden plugin tud saját menüelemet létrehozni az adminban, ha létezik neki studio_admin_menu.php configja és abban az admin_menu
        'admin_menu' => [
            'default' => [
                'text' => 'Nyitóoldal',
                'style' => 'home',
                'url' => [
                    'plugin' => 'TSCms',
                    'prefix' => 'Admin',
                    'controller' => 'Pages',
                    'action' => 'dashboard'

                ],
                'disabledGroups' => [],
                'position' => 0
            ],
            'menu_editor' => [
                'text' => 'Menü szerkesztő',
                'style' => 'menu',
                'url' => [
                    'plugin' => 'TSCms',
                    'prefix' => 'Admin',
                    'controller' => 'Menus',
                    'action' => 'index'
                ],
                'urlOtherActions' => ['add', 'edit'],
                'position' => 1
            ],
            'slider_images' => [
                'text' => 'Képcserélő',
                'style' => 'screen_share',
                'url' => [
                    'plugin' => 'TSCms',
                    'prefix' => 'Admin',
                    'controller' => 'SliderImages',
                    'action' => 'index'
                ],
                'urlOtherActions' => ['add', 'edit', 'view'],
                'position' => 2
            ],
            'pages' => [
                'text' => 'Oldalak',
                'style' => 'bookmarks',
                'url' => [
                    'plugin' => 'TSCms',
                    'prefix' => 'Admin',
                    'controller' => 'Pages',
                    'action' => 'index'
                ],
                'urlOtherActions' => ['add', 'edit', 'view'],
                'position' => 3
            ],
            'about_us' => [
                'text' => 'Rólunk mondták',
                'style' => 'settings',
                'url' => [
                    'plugin' => 'TSCms',
                    'prefix' => 'Admin',
                    'controller' => 'Testimonials',
                    'action' => 'index'
                ],
                'urlOtherActions' => ['add', 'edit', 'view'],
                'position' => 5
            ],
            'settings' => [
                'text' => 'Beállítások',
                'style' => 'settings',
                'url' => '#',
                'position' => 99,
                'submenus' => [
                    'page_texts' => [
                        'text' => 'Oldal szövegek',
                        'url' => [
                            'plugin' => 'TSCms',
                            'prefix' => 'Admin',
                            'controller' => 'PageTexts',
                            'action' => 'index'
                        ],
                        'urlOtherActions' => ['add', 'edit', 'view'],
                        'position' => 1
                    ],
                    [
                        'text' => 'Email sablonok',
                        'url' => [
                            'plugin' => 'TSCms',
                            'prefix' => 'Admin',
                            'controller' => 'EmailTemplates',
                            'action' => 'index'
                        ],
                        'urlOtherActions' => ['add', 'edit', 'view'],
                        'position' => 5
                    ],
                    [
                        'text' => 'Felhasználók',
                        'url' => [
                            'plugin' => 'TSCms',
                            'prefix' => 'Admin',
                            'controller' => 'Users',
                            'action' => 'index',
                        ],
                        'disabledGroups' => [],
                        'urlOtherActions' => ['add', 'edit', 'view'],
                        'position' => 10,
                    ],
                    [
                        'text' => 'Felhasználó csoportok',
                        'url' => [
                            'plugin' => 'TSCms',
                            'prefix' => 'Admin',
                            'controller' => 'UserGroups',
                            'action' => 'index',
                        ],
                        'urlOtherActions' => ['add', 'edit'],
                        'position' => 15,
                    ],
                    [
                        'text' => 'Fordítások',
                        'url' => [
                            'plugin' => 'TSCms',
                            'prefix' => 'Admin',
                            'controller' => 'I18nMessages',
                            'action' => 'index'
                        ],
                        'position' => 20
                    ],
                    [
                        'text' => 'Átirányítások',
                        'url' => [
                            'plugin' => 'TSCms',
                            'prefix' => 'Admin',
                            'controller' => 'Redirects',
                            'action' => 'index'
                        ],
                        'urlOtherActions' => ['add', 'edit'],
                        'position' => 25
                    ],
                    [
                        'text' => 'Oldal beállítások',
                        'url' => [
                            'plugin' => 'TSCms',
                            'prefix' => 'Admin',
                            'controller' => 'Settings',
                            'action' => 'editAll'
                        ],
                        'urlOtherActions' => ['add', 'edit', 'view'],
                        'position' => 30
                    ],
                    [
                        'text' => 'Címkék',
                        'url' => [
                            'plugin' => 'Tags',
                            'prefix' => 'Admin',
                            'controller' => 'Tags',
                            'action' => 'index'
                        ],
                        'urlOtherActions' => ['add', 'edit'],
                        'position' => 35
                    ]
                ]
            ],
            'audit' => [
                'text' => 'Napló',
                'style' => 'list',
                'url' => [
                    'plugin' => 'AuditLog',
                    'prefix' => 'Admin',
                    'controller' => 'Audits',
                    'action' => 'index'
                ],
                'urlOtherActions' => ['add', 'edit', 'view'],
                'position' => 110
            ],
        ]
    ]
];