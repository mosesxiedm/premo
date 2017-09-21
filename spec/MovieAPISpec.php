<?php
namespace DM\MovieApp\Services;

fdescribe(MovieApi::class, function () {
	describe("->fetchMovies", function () {
		it("returns array of movies", function (){
			$movie_instanceAPI = new MovieApi();
			expect(count($movie_instanceAPI->fetchMovies()))->toBeGreaterThan(2);
		});
	});

	describe("->getmovieInfo", function () {
		it("returns overview", function (){
			$movie_instanceAPI = new MovieApi();
			expect($movie_instanceAPI->getmovieInfo(0))->toBe("Several years after the tragic death of their little girl, a dollmaker and his wife welcome a nun and several girls from a shuttered orphanage into their home, soon becoming the target of the dollmaker's possessed creation, Annabelle.");
		});
	});

	describe("->filter", function () {
		it("returns filtered options", function (){
			$movie_instanceAPI = new MovieApi();
			expect(count($movie_instanceAPI->filter(6.4,"2017-08-03")))->toBeGreaterThan(0);
		});
	});
});