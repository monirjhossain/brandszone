<?php

return [
    'preloader_classes' => [
        'scale-in-center',
        'swirl-in-fwd',
        'swirl-in-bck',
        'flip-in-diag-1-bl',
        'slit-in-diagonal-2',
        'slide-in-fwd-center',
        'slide-in-elliptic-right-fwd',
        'bounce-in-fwd',
        'roll-in-left',
        'roll-in-top',
        'roll-in-right',
        'roll-in-bottom',
        'roll-in-blurred-bottom',
    ],

    'preloader_icon_witdh' => env('PRELOADER_ICON_WITDH', "150"),

    'preloader_active_class' => env('PRELOADER_ACTIVE_CLASS', 'bounce-in-fwd'),

    'preloader_icon' => env('PRELOADER_ICON', 'preloader.png'),

    'preloader_bg' => env('PRELOADER_BG', '#353b48'),

];