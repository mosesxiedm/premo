<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Model\Movie;
use \Phalcon\Mvc\Controller;

class InfoController extends Controller
{
    public function infoAction($id)
    {
        $movie = Movie::findFirst($id);
        /*
        header('Content-type: image/jpeg;');

        $url = "http://image.tmdb.org/t/p/w500" . $movie->poster_path;

        $image = file_get_contents($url);
        */

        $this->view->image =  $movie->poster_path;

        $this->view->title = $movie->title;

        $this->view->release_date = $movie->release_data;

        $this->view->overview = $movie->overview;

    }
}
