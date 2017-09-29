<?php
namespace DM\MovieApp\Model;

use Phalcon\Mvc\Model;

class Movie extends Model
{
    public $id;
    public $title;
    public $rating;
    public $release_data;
    public $overview;
    public $poster_path;

    public function getPosterpath()
    {
        return $this->poster_path;
    }

    public function getId()
    {
        return $this->id;
    }

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

    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }
}
