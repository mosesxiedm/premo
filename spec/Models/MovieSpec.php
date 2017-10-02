<?php
namespace DM\MovieApp\Model;

use DM\MovieApp\Model\Movie;
use DM\MovieApp\Services\MovieAPI;
use \Phalcon\Mvc\Controller;

describe(Movie::class, function () {
    describe("->getId", function () {
        it("returns the movie id", function () {
            $movie_instance = new Movie();
            $movie_instance->id = "1234";
            expect($movie_instance->getId())->toBe("1234");
        });
    });

    describe("->getPosterpath", function () {
        it("returns the movie poster path", function () {
            $movie_instance = new Movie();
            $movie_instance->poster_path = "1234";
            expect($movie_instance->getPosterpath())->toBe("1234");
        });
    });

    describe("->getName", function () {
        it("returns the movie name", function () {
            $movie_instance = new Movie();
            $movie_instance->title = "1234";
            expect($movie_instance->getName())->toBe("1234");
        });
    });

    describe("->getRating", function () {
        it("returns the movie rating", function () {
            $movie_instance = new Movie();
            $movie_instance->rating = "1234";
            expect($movie_instance->getRating())->toBe("1234");
        });
    });

    describe("->getReleaseData", function () {
        it("returns the movie release_data", function () {
            $movie_instance = new Movie();
            $movie_instance->release_data = "1234";
            expect($movie_instance->getReleaseData())->toBe("1234");
        });
    });

    describe("->getOverview", function () {
        it("returns the movie overview", function () {
            $movie_instance = new Movie();
            $movie_instance->overview = "1234";
            expect($movie_instance->getOverview())->toBe("1234");
        });
    });
});
