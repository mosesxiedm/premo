<?php
namespace DM\MovieApp\Controllers;
use DM\MovieApp\Services\MovieAPI;


class IndexController 
{
    public function indexAction()
    {

    	$movieAPI = new MovieAPI();
    	return $movieAPI->fetchMovies();

    }
}
