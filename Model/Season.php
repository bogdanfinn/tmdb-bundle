<?php

namespace bogdanfinn\tmdbBundle\Model;


class Season
{
    private $id;

    private $name;

    private $overview;

    private $season_number;

    private $poster_path;

    private $air_date;

    private $episodes;


    /**
     * Season constructor.
     * @param $apiSeason
     */
    public function __construct($apiSeason)
    {
        foreach($apiSeason as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                $this->$key = $val;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * @param mixed $overview
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;
    }

    /**
     * @return mixed
     */
    public function getSeasonNumber()
    {
        return $this->season_number;
    }

    /**
     * @param mixed $season_number
     */
    public function setSeasonNumber($season_number)
    {
        $this->season_number = $season_number;
    }

    /**
     * @return mixed
     */
    public function getPosterPath()
    {
        return $this->poster_path;
    }

    /**
     * @param mixed $poster_path
     */
    public function setPosterPath($poster_path)
    {
        $this->poster_path = $poster_path;
    }

    /**
     * @return mixed
     */
    public function getAirDate()
    {
        return $this->air_date;
    }

    /**
     * @param mixed $air_date
     */
    public function setAirDate($air_date)
    {
        $this->air_date = $air_date;
    }

    /**
     * @return mixed
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * @param mixed $episodes
     */
    public function setEpisodes($episodes)
    {
        $this->episodes = $episodes;
    }
}