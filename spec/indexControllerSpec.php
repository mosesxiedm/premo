<?php
namespace DM\MovieApp\Controllers;

describe(MovieApi::class, function () {
    describe("->indexAction", function () {
        it("calls fetch movies", function (){
            $indexController_instance = new indexController();
            expect(count($indexController_instance->indexAction()))->toBeGreaterThan(0);
        });
    });
    describe("->storeMovies", function () {
        it("stores movies into the database", function (){
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
        it("stores movie models into database", function(){
            $indexController_instance = new indexController();
            expect();
        });
    });
});
