<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Services\MovieAPI;
use \Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
    	$this->view->movies = $this->getMoviesFromApi();
    }

    public function getMoviesFromApi()
    {
    	$movieAPI = new MovieAPI();
    	return $movieAPI->fetchMovies();
    }
}
