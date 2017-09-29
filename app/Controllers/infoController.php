<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Model\Movie;
use \Phalcon\Mvc\Controller;

class InfoController extends Controller
{
    public function infoAction($id)
    {
        $movie = Movie::findFirst($id);

        $this->view->image =  $movie->poster_path;

        $this->view->title = $movie->title;

        $this->view->release_date = $movie->release_data;

        $this->view->overview = $movie->overview;

    }
}
