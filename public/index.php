<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Phalcon\Loader;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Url as UrlProvider;



// Register an autoloader
$loader = new Loader();

// $loader->registerDirs(
//     [
//         "../app/Controllers/",
//         "../app/Models/",
//     ]
// );


$loader->registerNamespaces(
    [
       'DM\MovieApp\Controllers' => '../app/Controllers',
       'DM\MovieApp\Model' => '../app/Models',
       'DM\MovieApp\Services' => '../app/Services',
    ]
);

$loader->register();

// require './vendor/autoloader.php';
require '../config/bootstrap.php';

$application = new Application($di);
try {
    // Handle the request
    $response = $application->handle();

    $response->send();
} catch (\Exception $e) {

    echo "Exception: ", $e->getMessage();
    echo '<pre>';
    var_dump($e->getTraceAsString());
}