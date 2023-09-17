<?php
require_once __DIR__.'/vendor/autoload.php';

Flight::route('POST /analyze', function() {
    $request = Flight::request()->data->getData();
    $text = $request['text'];
    putenv("PYTHONPATH=".__DIR__."/env/lib/python3.10/site-packages");

    $result = exec(__DIR__.'/env/bin/python model/script.py "'. $text . '"');
    Flight::json([ 'message' => $result ]);
});


Flight::start();