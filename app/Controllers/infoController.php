<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Services\MovieAPI;
use \Phalcon\Mvc\Controller;

class InfoController extends Controller
{
    public function indexAction()
    {
    	$list_of_movies = $this->getMoviesFromApi();
    	
    	for($i=0; $i<count($list_of_movies); $i++){

    	$this->view->movies = $list_of_movies[0]->overview;

    	}	

    }

    public function getMoviesFromApi()
    {
    	$movieAPI = new MovieAPI();
    	return $movieAPI->fetchMovies();
    }
}
