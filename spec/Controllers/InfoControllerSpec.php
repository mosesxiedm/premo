<?php
namespace DM\MovieApp\Controllers;

use Kahlan\Plugin\Stub;
use DM\MovieApp\Model\Movie;
use DM\MovieApp\Services\MovieAPI;
use Phalcon\Mvc\Controller;

describe(infoController::class, function () {

    // public $id;
    // public $title;
    // public $rating;
    // public $release_data;
    // public $overview;
    // public $poster_path;
    given('movie', function () {
        $movie_test = new Movie;
        $movie_test->id = 141052;
        $movie_test->title = "hello";
        $movie_test->rating = 2;
        $movie_test->release_data = "231";
        $movie_test->overview = "dfasf";
        $movie_test->poster_path = 'asfd';
        return $movie_test;
    });

    beforeEach(function () {
        $this->controller = Stub::create([
            'layer' => true,
            'extends' => InfoController::class
        ]);
        $this->controller->request = Stub::create();
    });

    xdescribe('->infoAction', function() {
        it('findFirst returns the movie with correct id', function(){
            //     Stub::on($this->controller)
            //     ->method('getMovie')
            //     ->andReturn($this->$movie_test);
            // expect($this->controller->getMovie(141052))toBe($movie_test);
        });
    });
});
