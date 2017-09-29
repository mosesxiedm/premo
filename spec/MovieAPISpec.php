<?php
namespace DM\MovieApp\Services;

describe(MovieApi::class, function () {
    describe("->fetchMovies", function () {
        it("returns array of movies", function () {
            $movie_instanceAPI = new MovieApi();
            expect(count($movie_instanceAPI->fetchMovies()))->toBeGreaterThan(2);
        });
    });

    describe("->buildURL", function () {
        it("returns API url", function () {
            $movie_instanceAPI = new MovieApi();
            expect($movie_instanceAPI->buildURL())->toBe("https://api.themoviedb.org/3/discover/movie?api_key=f312ac2cb63002f508d52fd432cea28d&language=en-US&page=1&primary_release_date.gte=2017-09-29");
        });
    });

    describe("->buildDate", function () {
        it("returns correct date", function(){
            $movie_instanceAPI = new MovieApi();
            expect($movie_instanceAPI->buildDate())->toBe("2017-09-29");
        });
    });

});