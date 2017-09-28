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
});
