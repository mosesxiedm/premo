<?php
namespace DM\MovieApp\Model;

use Phalcon\Mvc\Model;

class Movie
{
	public $name;
	public $rating;
	public $release_data;
	public $overview;

	public function getName()
	{
		return $this->name;
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
}
