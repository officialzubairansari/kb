<?php

const VERSION = 'v1.1.0';
const MENU_ITEMS = [
    'Reservations' => [
        'title' => 'Reservations',
        'icon' => 'ri-calendar-todo-line',
        'route' => 'child_reservations',
        'permissions' => ['list reservations'],
        'submenu' => [
            [
                'title' => 'Pending Reservation',
                'route' => 'reservations.pending',
                'permissions' => ['list reservations'],
            ],
            [
                'title' => 'Confirmed Reservation',
                'route' => 'reservations.confirmed',
                'permissions' => ['list reservations'],
            ],
            [
                'title' => 'Completed Reservation',
                'route' => 'reservations.completed',
                'permissions' => ['list reservations'],
            ],
            [
                'title' => 'Cancelled Reservation',
                'route' => 'reservations.cancelled',
                'permissions' => ['list reservations'],
            ],
        ]
    ],
    'Emails' => [
        'title' => 'Emails',
        'icon' => 'ri-mail-fill',
        'route' => 'child_settings',
        'permissions' => ['list settings'],
        'submenu' => [
            [
                'title' => 'Quotation',
                'route' => 'quotation.email',
                'permissions' => ['list settings'],
            ],
        ]
    ],
    'Customers' => [
        'title' => 'Customers',
        'icon' => 'ri-group-fill',
        'route' => 'customers.list',
        'permissions' => ['list customers'],
    ],
    'Fares' => [
        'title' => 'Fares',
        'icon' => 'ri-money-dollar-box-fill',
        'route' => 'fares.list',
        'permissions' => ['list fares'],
    ],
    'Drivers' => [
        'title' => 'Drivers',
        'icon' => 'ri-user-2-fill',
        'route' => 'drivers.list',
        'permissions' => ['list drivers'],
    ],
    'Vehicles' => [
        'title' => 'Vehicles',
        'icon' => 'ri-roadster-fill',
        'route' => 'child_vehicles',
        'permissions' => ['list vehicles'],
        'submenu' => [
            [
                'title' => 'Vehicles',
                'route' => 'vehicles.list',
                'permissions' => ['list vehicles'],
            ],
            [
                'title' => 'Vehicle Categories',
                'route' => 'vehicle.categories.list',
                'permissions' => ['list vehicles'],
            ],
        ]
    ],
    'Routes' => [
        'title' => 'Routes',
        'icon' => 'ri-route-fill',
        'route' => 'routes.list',
        'permissions' => ['list routes'],
    ],
    'Messages' => [
        'title' => 'Messages',
        'icon' => 'ri-mail-open-fill',
        'route' => 'messages.list',
        'permissions' => ['list messages'],
    ],
    'Settings' => [
        'title' => 'Settings',
        'icon' => 'ri-settings-3-fill',
        'route' => 'child_settings',
        'permissions' => ['list settings'],
        'submenu' => [
            [
                'title' => 'General Settings',
                'route' => 'general.settings.list',
                'permissions' => ['list settings'],
            ],
            [
                'title' => 'Whatsapp Templates',
                'route' => 'whatsapp.templates.list',
                'permissions' => ['list settings'],
            ],
            [
                'title' => 'Email Templates',
                'route' => 'email.templates.list',
                'permissions' => ['list settings'],
            ],
            [
                'title' => 'Company Information',
                'route' => 'companies.list',
                'permissions' => ['list settings'],
            ],
            [
                'title' => 'Pages',
                'route' => 'pages.list',
                'permissions' => ['list settings'],
            ],
            [
                'title' => 'Blogs',
                'route' => 'blogs.list',
                'permissions' => ['list settings'],

            ],
            [
                'title' => 'Faqs',
                'route' => 'faqs.list',
                'permissions' => ['list settings'],

            ],
            [
                'title' => 'Testimonials',
                'route' => 'testimonials.list',
                'permissions' => ['list settings'],
            ],
            [
                'title' => 'Sliders',
                'route' => 'sliders.list',
                'permissions' => ['list settings'],
            ],
            [
                'title' => 'Highlights',
                'route' => 'highlights.list',
                'permissions' => ['list settings'],
            ],
            [
                'title' => 'Frontend Settings',
                'route' => 'frontend.settings.list',
                'permissions' => ['list website settings'],
            ],
            [
                'title' => 'Site Colors',
                'route' => 'site.colors.list',
                'permissions' => ['list website settings'],
            ],
        ]
    ],
    'Users' => [
        'title' => 'Users',
        'icon' => 'ri-group-fill',
        'route' => 'users.list',
        'permissions' => ['list users'],
    ],
];
