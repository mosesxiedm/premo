<?php
namespace DM\MovieApp\Controllers;

use Kahlan\Plugin\Stub;
use DM\MovieApp\Model\Movie;
use DM\MovieApp\Services\MovieAPI;
use Phalcon\Mvc\Controller;

describe(infoController::class, function () {

//    public $id;
    // public $title;
    // public $rating;
    // public $release_data;
    // public $overview;
    // public $poster_path;
    given('movie', function () {
        $movie = new Movie;
        $movie->id = 141052;
        $movie->title = "hello";
        $movie->rating = 2;
        $movie->release_data = "231";
        $movie->overview = "dfasf";
        $movie->poster_path = 'asfd';
        return $movie;
    });

    beforeEach(function () {
        $this->controller = Stub::create([
            'layer' => true,
            'extends' => InfoController::class
        ]);
        $this->controller->request = Stub::create();
    });

    describe('->infoAction', function() {
        it('findFirst returns the movie with correct id', function(){
            expect($this->movie->id)->toBe(141052);
            expect($this->movie->title)->toBe("hello");
            expect($this->movie->rating)->toBe(2);
            expect($this->movie->release_data)->toBe("231");
            expect($this->movie->overview)->toBe("dfasf");
            expect($this->movie->poster_path)->toBe('asfd');

            $this->controller->infoAction(141052);
        });
    });
});
