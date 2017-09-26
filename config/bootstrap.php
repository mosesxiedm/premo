<?php
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

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
                "host"     => "mysql",
                "username" => "premo",
                "password" => "premo",
                "dbname"   => "premo",
            ]
        );
    }
);

//Setup a base URI so that all generated URIs include the "tutorial" folder
$di->set('url', function() {
    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri('/');
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
$router = $di->get('router');

$router->setUriSource(
    Router::URI_SOURCE_SERVER_REQUEST_URI
);

$router->add (
    "/",
    [
        "controller" => "index",

        "action"     => "index",
    ]
);

$router->add (
    "/info",
    [
        "controller" => "info",

        "action"     => "info",
    ]
);

$router->add(
    "/info/{id:[0-9]+}",
    [
        "controller" => "info",
        "action"     => "info",
    ]
);



$router->handle();
