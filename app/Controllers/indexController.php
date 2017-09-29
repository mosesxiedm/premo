<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Model\Movie;
use DM\MovieApp\Services\MovieAPI;
use Phalcon\Mvc\Controller;

class IndexController extends Controller {
	public function indexAction() {
		$sort_by = $this->request->getQuery("sort");

		$list_of_movies = $this->getMoviesFromApi();

		$this->storeMovies($list_of_movies);

		$list_of_movies = $this->sort($sort_by);

		$this->view->movies = $list_of_movies;
	}

	public function sort($sort_method) {
		if ($sort_method == "rating") {

			$filtered_movies = Movie::find(["order" => "rating DESC"]);

		} elseif ($sort_method == "alphabetical") {

			$filtered_movies = Movie::find([
				"order" => "title ASC"]);

		} else {

			$filtered_movies = Movie::find([
				"order" => "release_data ASC"]);
		}

		Movie::find();
		return $filtered_movies;
	}

	public function getMoviesFromApi() {
		$movie_api = new MovieAPI();
		return $movie_api->fetchMovies();
	}

	public function storeMovies($list_of_movies) {
		for ($i = 0; $i < count($list_of_movies); $i++) {

			$movie = Movie::findFirst($list_of_movies[$i]->id);

			if (empty($movie)) {
				$list_of_movies[$i]->save();
			}
		}
	}
}
