<?php
namespace DM\MovieApp\Model;

use Phalcon\Mvc\Model;

class Movie extends Model
{

	public $title;
	public $rating;
	public $release_data;
	public $overview;

	public function getName()
	{
		return $this->title;
	}

	public function getRating()
	{
		return $this->rating;
	}

	public function getReleaseData()
	{
		return $this->release_data;
	}

	public function getOverview()
	{
		return $this->overview;
	}

	    public function initialize()
    {
        $this->setSource("movie");
    }

}
