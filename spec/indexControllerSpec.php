<?php
namespace DM\MovieApp\Controllers;

use Kahlan\Plugin\Stub;
use DM\MovieApp\Model\Movie;
use DM\MovieApp\Services\MovieAPI;
use \Phalcon\Mvc\Controller;

describe(MovieApi::class, function () {
    beforeEach(function () {
            $this->controller = new indexController();
    });

    describe("->indexAction", function () {
        it("calls getMoviesFromApi", function (){
            expect($this->controller)
                ->toReceive('getMoviesFromApi');
        });
        it("calls storeMovies", function (){
            expect($this->controller)
                ->toReceive('storeMovies')
                ->with(array(1234));
        });
        it("calls sort", function (){
            expect($this->controller)
                ->toReceive('sort')
                ->with('alphabetical');
        });
    });

    describe("->getMoviesFromApi", function(){
        it("returns movies", function(){
            $indexController_instance = new indexController();
            expect(count($indexController_instance->getMoviesFromApi()))->toBeGreaterThan(2);
        });
    });

    given('list_of_movies', function () {
        $list_of_movies = array();
        $movie = new Movie;
        $movie->id = 12345;
        $list_of_movies[] = $movie;
        return $list_of_movies;
            });

    describe("->storeMovies", function(){
        it("saves if findFirst returns empty", function(){
            expect(Movie::class)
                ->toReceive('save');
            Stub::on($this->controller)
                ->method('::getMoviesFromApi')
                ->andReturn(array());
            Stub::on(Movie::class)
                ->method('::findFirst')
                ->andReturn();
            $this->controller->storeMovies($this->list_of_movies);
        });
    });
});



