<?php

/**
 * This is a modified file of Laravel Hashids to encode & decode Hash Id
 * This file's copyright belongs to
 * (c) Vincent Klaiber <hello@vinkla.com>
 * Thaking you dear a lot.
 */


    /*
    |--------------------------------------------------------------------------
    | akr4m - Laravel Hash Id for Unique Identification for table's field data
    |--------------------------------------------------------------------------
    |
    |   Thanking you.
    |
    |   Alex Garret (https://twitter.com/alexjgarrett) - I'm dedicating this to you.
    |
    */

declare (strict_types = 1);

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
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    /**
     * By default hash id length is 30, You can Change it. - akr4m
     */

    'connections' => [

        'main' => [
            'salt' => env('APP_KEY'),
            'length' => env('APP_MODEL_HASH_ID_LENGTH', 30),
        ],

        'alternative' => [
            'salt' => 'your-salt-string',
            'length' => 'your-length-integer',
        ],

    ],

];
