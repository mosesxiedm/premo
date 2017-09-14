<?php
namespace DM\MovieApp\Model;

describe(Movie::class, function () {
	describe("->getName", function () {
		it("returns name", function (){
			$movie_instance = new Movie();
			$movie_instance->name = "yo";
			expect($movie_instance->getName())->toBe("yo");
		});
	});
});
