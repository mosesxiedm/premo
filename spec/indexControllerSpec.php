<?php
namespace DM\MovieApp\Controllers;

describe(MovieApi::class, function () {
	describe("->indexAction", function () {
		it("calls fetch movies", function (){
			$indexController_instance = new indexController();
			expect(count($indexController_instance->indexAction()))->toBeGreaterThan(0);
		});
	});
});
