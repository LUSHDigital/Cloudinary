<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Cloudinary Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [

            'cloud_name' => '',
            'api_key' => '',
            'api_secret' => '',
            'api_base_url' => '',
            'base_url' => '',
            'secure_url' => '',

            /*
            |------------------------------------------------------------------
            | Default image scaling to show.
            |------------------------------------------------------------------
            |
            | If you not pass options parameter to Cloudy::show the default
            | will be replaced.
            |
            */

            'scaling' => [
                'format' => 'png',
                'width'  => 150,
                'height' => 150,
                'crop'   => 'fit',
                'effect' => null
            ],

        ],

    ],

];
