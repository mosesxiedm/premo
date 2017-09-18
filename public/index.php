<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Dispatcher;



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

// Create a DI
$di = new FactoryDefault();

// Setup the view component
$di->set(
    "view",
    function () {
        $view = new View();

        $view->setViewsDir("../app/views/");

        return $view;
    }
);

// Setup the database service
$di->set(
    "db",
    function () {
        return new DbAdapter(
            [
                "host"     => "localhost",
                "username" => "root",
                "password" => "secret",
                "dbname"   => "test_db",
            ]
        );
    }
);

//Setup a base URI so that all generated URIs include the "tutorial" folder
$di->set('url', function(){
    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri('/premo/');
    return $url;
});



// Registering a dispatcher
$di->set('dispatcher',function () {
        $dispatcher = new Dispatcher();

        $dispatcher->setDefaultNamespace(
            'DM\MovieApp\Controllers'
        );

        return $dispatcher;
    }
);

// Create the router
$router = new \Phalcon\Mvc\Router();
$router->setUriSource(
    Router::URI_SOURCE_SERVER_REQUEST_URI
);

$router->add(
    "/",
    [
        "controller" => "index",
        "action"     => "index",
    ]
);
$router->handle();

// $di->set('router', function() use ($router) {
//     return $router;
// });

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