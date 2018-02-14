<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    // services.php

    //facebook authentification

    'facebook' => [
        'client_id' => '1805040352900309',
        'client_secret' => '51da7870bb7038805a476f0551c30222',
        'redirect' => 'http://localhost:8000/front/login/facebook/callback',
    ],

     //google authentification

     'google' => [
        'client_id' => '543459280316-sh15q5dfbac8kni81pe0me2e2vnm7qqp.apps.googleusercontent.com',
        'client_secret' => 'bDmznX-kc-cJ7KAsel21lKzx',
        'redirect' => 'http://localhost:8000/front/login/google/callback',
    ],

];
