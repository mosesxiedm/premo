<?php
namespace DM\MovieApp\Controllers;

use Kahlan\Plugin\Stub;
use DM\MovieApp\Model\Movie;
use DM\MovieApp\Services\MovieAPI;
use Phalcon\Mvc\Controller;

describe(infoController::class, function () {

    given('list_of_movies', function () {
        $list_of_movies = array();
        $movie = new Movie;
        $movie->id = 141052;
        $list_of_movies[] = $movie;
        return $list_of_movies;
    });

    beforeEach(function () {
        $this->controller = Stub::create([
            'layer' => true,
            'extends' => InfoController::class
        ]);
        $this->controller->request = Stub::create();
    });

    describe('->indexAction', function(){
        it('findFirst returns the movie with correct id', function(){

        });
    });

});
