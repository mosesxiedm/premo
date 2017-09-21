<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Services\MovieAPI;
use DM\MovieApp\Model\Movie;
use \Phalcon\Mvc\Controller;

class InfoController extends Controller
{
    public function infoAction($id)
    {


        $movie = Movie::findFirst($id);

        $this->view->title = $movie->title;

        $this->view->overview = $movie->overview;

    }

}
