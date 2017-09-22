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

        for($i=0; $i<count($obj->results); $i++) {

            $movie = new Movie;

            $movie->id = $obj->results[$i]->id;

            $movie->title = $obj->results[$i]->title;

            $movie->rating = $obj->results[$i]->vote_average;

            $movie->release_data = $obj->results[$i]->release_date;

            $movie->overview = $obj->results[$i]->overview;

            $list_of_movies[] = $movie;
        }

        return $list_of_movies;
    }
}