<?php
namespace DM\MovieApp\Services;

use Phalcon\Mvc\Model;
use DM\MovieApp\Model\Movie;

class MovieApi
{
	public function fetchMovies()
	{
		$list_of_movies = array();

		ini_set("allow_url_fopen", 1);

		$json = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=f312ac2cb63002f508d52fd432cea28d');

		$obj = json_decode($json);

		for($i=0; $i<count($obj->results); $i++){

			$movie = new Movie;

			$movie->title = $obj->results[$i]->title;

			$movie->rating = $obj->results[$i]->vote_average;

			$movie->release_data = $obj->results[$i]->release_date;

			$movie->overview = $obj->results[$i]->overview;

			$list_of_movies[] = $movie;

		}

		return $list_of_movies;
	}



		public function getmovieInfo($index)
	{
		ini_set("allow_url_fopen", 1);

		$json = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=f312ac2cb63002f508d52fd432cea28d');

		$obj = json_decode($json);

		return $obj->results[$index]->overview;
	}

	public function sort($sort_method)
	{

		if($sort_method ==  "rating"){
			$filtered_movies = Movie::find(
				[
				"order" => "rating DESC, release_data"
				]
				);

		} elseif ($sort_method == "alphabetical") {

			$filtered_movies = Movie::find(
				[
				"order" => "title DESC, release_data"
				]
				);

		} else{

			$filtered_movies = Movie::find(
				[
				"order" => "release_data DESC"
				]
				);
		}

		return $filtered_movies;

		/*

		$raw_movies = $this->fetchMovies();

		$list_of_movies = array();

		for($i=0; $i<count($raw_movies); $i++){

			if((($raw_movies[$i]->rating  == $rating) || ($raw_movies[$i]->rating  == 0)) && (($raw_movies[$i]->release_data  == $release_date) || ($raw_movies[$i]->release_data  == 0))){
				
				$list_of_movies[] = $raw_movies[$i];

			}

		}

		return $list_of_movies;
		*/
	
	}
}