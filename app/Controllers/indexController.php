<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Services\MovieAPI;
use \Phalcon\Mvc\Controller;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;

class IndexController extends Controller
{
    public function indexAction()
    {
    	$list_of_movies = $this->getMoviesFromApi();

    	$this->storeMovies($list_of_movies);

    	for($i=0; $i<count($list_of_movies); $i++){

    	$this->view->movies = $list_of_movies;

    	$form = new Form();

$form->add(
    new Text(
        'name'
    )
);

$form->add(
    new Text(
        'telephone'
    )
);

$form->add(
    new Select(
        'telephoneType',
        [
            'H' => 'Home',
            'C' => 'Cell',
        ]
    )
);

    	}

    }

    public function getMoviesFromApi()
    {
    	$movieAPI = new MovieAPI();
    	return $movieAPI->fetchMovies();
    }

    public function storeMovies($list_of_movies)
    {
    	for($i=0; $i<count($list_of_movies); $i++){

		$list_of_movies[$i]->save();

		}

    }
   

}
