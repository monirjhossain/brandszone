<?php

return [

    /**
     * Choose the layout for the manyvendor.
     */

    'mobile_categroy' => 'new', // old or new

    'live_campaign_desktop' => 'type2', // type1, type2, type3

    'product_catalog' => 'type1', // type1, type2

    'border' => 'no-border', // no-border, has-space

    'delivery_active' => env('DELIVERY_ACTIVE', 'YES'),

    'preloader_layout' => env('PRELOADER_LAYOUT', '2'), //choose layout 1,2,3

    'google_translate' => env('GOOGLE_TRANSLATE', 'YES'), //google translate YES or NO

];