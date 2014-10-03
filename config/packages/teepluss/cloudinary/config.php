<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Cloudinary API configuration
    |--------------------------------------------------------------------------
    |
    | Before using Cloudinary you need to register and get some detail
    | to fill in below, please visit cloudinary.com.
    | test
    */

    'cloudName'  => getenv('CLOUDNAME'),
    'baseUrl'    => getenv('BASEURL'),
    'secureUrl'  => getenv('SECUREURL'),
    'apiBaseUrl' => getenv('APIBASEURL'),
    'apiKey'     => getenv('APIKEY'),
    'apiSecret'  => getenv('APISECRET'),
    /*
    |--------------------------------------------------------------------------
    | Default image scaling to show.
    |--------------------------------------------------------------------------
    |
    | If you not pass options parameter to Cloudy::show the default
    | will be replaced.
    |
    */

    'scaling'    => array(
        'format' => 'png',
        'width'  => 150,
        'height' => 150,
        'crop'   => 'fit',
        'effect' => null
    )

);
