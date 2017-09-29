<?php
namespace DM\MovieApp\Controllers;

use Kahlan\Plugin\Stub;
use DM\MovieApp\Model\Movie;
use DM\MovieApp\Services\MovieAPI;
use Phalcon\Mvc\Controller;

describe(indexController::class, function () {

    given('list_of_movies', function () {
        $list_of_movies = array();
        $movie = new Movie;
        $movie->id = 12345;
        $list_of_movies[] = $movie;
        return $list_of_movies;
    });

    beforeEach(function () {
        $this->controller = Stub::create([
            'layer' => true,
            'extends' => IndexController::class
        ]);
        $this->controller->request = Stub::create();
    });

    describe("->indexAction", function () {
        it("calls getMoviesFromApi", function (){
            Stub::on($this->controller)
                ->method('getMoviesFromApi')
                ->andReturn($this->list_of_movies);

            expect($this->controller)
                ->toReceive('getMoviesFromApi');

            $this->controller->indexAction();
        });
        it("calls storeMovies", function (){
            Stub::on($this->controller)
                ->method('storeMovies')
                ->with($this->list_of_movies);
            Stub::on($this->controller)
                ->method('getMoviesFromApi')
                ->andReturn($this->list_of_movies);
            expect($this->controller)
                ->toReceive('storeMovies');
            $this->controller->indexAction();
        });
        it("calls sort", function (){
            Stub::on($this->controller)
                ->method('storeMovies')
                ->with($this->list_of_movies);
            Stub::on($this->controller)
                ->method('getMoviesFromApi')
                ->andReturn($this->list_of_movies);
            Stub::on($this->controller)
                ->method('sort');
            expect($this->controller)
                ->toReceive('sort');
            $this->controller->indexAction();
        });
    });

    xdescribe("->sort", function() {
        it("sorts by rating", function() {
            expect(Movie::class)
                ->toReceive('::find');
            $this->controller->sort('rating');

        });
    });

    describe("->getMoviesFromApi", function(){
        it("returns movies", function(){
            $indexController_instance = new indexController();
            expect(count($indexController_instance->getMoviesFromApi()))->toBeGreaterThan(2);
        });
    });

    xdescribe("->storeMovies", function(){
        it("saves if findFirst returns empty", function(){
            Stub::on($this->controller)
                ->method('::getMoviesFromApi')
                ->andReturn($this->list_of_movies);
            Stub::on(Movie::class)
                ->method('::findFirst')
                ->with($this->list_of_movies)
                ->andReturn();
            expect(Movie::class)
                ->toReceive('save');
            $this->controller->storeMovies($this->list_of_movies);
        });
    });
});



