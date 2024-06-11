<?php

return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET'),
    'settings' => [
        // 'sandbox' or 'live'
        'mode' => env('PAYPAL_MODE', 'sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path('logs/paypal.log'),
        // Available options: 'FINE', 'INFO', 'WARN', or 'ERROR
        'log.LogLevel' => 'ERROR',
    ],
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
];
