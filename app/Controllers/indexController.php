<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Services\MovieAPI;
use \Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
    	$list_of_movies = $this->getMoviesFromApi();
    	//$this->storeMovies($list_of_movies);
    	$string_of_movies = "";

    	for($i=0; $i<count($list_of_movies); $i++){

    	$string_of_movies .= $list_of_movies[$i]->title . "<br/>";
    	$this->view->movies = $string_of_movies;

    	}	

    }

    public function getMoviesFromApi()
    {
    	$movieAPI = new MovieAPI();
    	return $movieAPI->fetchMovies();
    }
/*
    public function storeMovies($list_of_movies)
    {

        $success = $list_of_movies[0]->save(
            $this->request->getPost(),
            [
                "title",
                "rating",
            ]
        );

        if ($success) {
            echo "Thanks for registering!";
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();

    }
    */

}
