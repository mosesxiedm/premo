<?php
namespace DM\MovieApp\Controllers;

use DM\MovieApp\Services\MovieAPI;
use DM\MovieApp\Model\Movie;
use \Phalcon\Mvc\Controller;

class InfoController extends Controller
{
    public function infoAction()
    {

    	$url = $_SERVER['REQUEST_URI'];
    	$string_array = str_split($url);
    	$fixed_url = "";

    	for($i=6; $i<count($string_array); $i++){

    	}

    }

}
