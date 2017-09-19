<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Services\MovieAPI;
use \Phalcon\Mvc\Controller;

class InfoController extends Controller
{
    public function indexAction()
    {
    	$robots = Robots::find("title = ");
    	echo $robots->overview, "\n";

    }

}
