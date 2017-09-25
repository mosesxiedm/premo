<?php
namespace DM\MovieApp\Services;

use Phalcon\Mvc\Model;
use DM\MovieApp\Model\Movie;

class MovieApi
{
    
    protected $base_url = 'https://api.themoviedb.org/3/discover/movie?';
    protected $api_key = 'f312ac2cb63002f508d52fd432cea28d';
    protected $language_key = 'en-US';

    public function buildDate ()
    {
        $tz = 'America/New_York';
        $timestamp = time();
        $dt = new \DateTime("now", new \DateTimeZone($tz));
        $dt->setTimestamp($timestamp);
        return $dt->format('Y-m-d');
    }

    public function buildURL()
    {
        $time = $this->buildDate();
        $url = $this->base_url . 'api_key=' . $this->api_key . '&language=' . $this->language_key . '&primary_release_date.gte=' . $time;
        return $url;
    }

    public function fetchMovies()
    {
        $url = $this->buildURL();

        $list_of_movies = array();

        ini_set("allow_url_fopen", 1);

        $json = file_get_contents($url);

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