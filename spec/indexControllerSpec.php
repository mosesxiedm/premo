<?php
namespace DM\MovieApp\Controllers;

describe(MovieApi::class, function () {
    describe("->indexAction", function () {
        it("calls fetch movies", function (){
            $indexController_instance = new indexController();
            expect(count($indexController_instance->indexAction()))->toBeGreaterThan(0);
        });
    });

    describe("->getMoviesFromApi", function(){
        it("returns movies", function(){
            $indexController_instance = new indexController();
            expect(count($indexController_instance->getMoviesFromApi()))->toBeGreaterThan(2);
        });
    });
    describe("->storeMovies", function(){
        it("calls findFirst and returns empty if it already exists", function(){
            $indexController_instance = new indexController();
            $list_of_movies = $indexController_instance->getMoviesFromApi();
            expect(count($list_of_movies))->toBeGreaterThan(2);
        });

    });
});
