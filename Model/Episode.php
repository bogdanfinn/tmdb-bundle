<?php

namespace bogdanfinn\tmdbBundle\Model;


class Episode
{
    private $id;

    private $name;

    private $guest_stars;

    private $overview;

    private $episode_number;

    private $crew;

    private $production_code;

    private $still_path;

    private $air_date;

    private $vote_count;

    private $vote_average;

    private $season_number;

    /**
     * Episode constructor.
     * @param $apiEpisode
     */
    public function __construct($apiEpisode)
    {
        foreach($apiEpisode as $key => $val) {
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
    public function getGuestStars()
    {
        return $this->guest_stars;
    }

    /**
     * @param mixed $guest_stars
     */
    public function setGuestStars($guest_stars)
    {
        $this->guest_stars = $guest_stars;
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
    public function getEpisodeNumber()
    {
        return $this->episode_number;
    }

    /**
     * @param mixed $episode_number
     */
    public function setEpisodeNumber($episode_number)
    {
        $this->episode_number = $episode_number;
    }

    /**
     * @return mixed
     */
    public function getCrew()
    {
        return $this->crew;
    }

    /**
     * @param mixed $crew
     */
    public function setCrew($crew)
    {
        $this->crew = $crew;
    }

    /**
     * @return mixed
     */
    public function getProductionCode()
    {
        return $this->production_code;
    }

    /**
     * @param mixed $production_code
     */
    public function setProductionCode($production_code)
    {
        $this->production_code = $production_code;
    }

    /**
     * @return mixed
     */
    public function getStillPath()
    {
        return $this->still_path;
    }

    /**
     * @param mixed $still_path
     */
    public function setStillPath($still_path)
    {
        $this->still_path = $still_path;
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
    public function getVoteCount()
    {
        return $this->vote_count;
    }

    /**
     * @param mixed $vote_count
     */
    public function setVoteCount($vote_count)
    {
        $this->vote_count = $vote_count;
    }

    /**
     * @return mixed
     */
    public function getVoteAverage()
    {
        return $this->vote_average;
    }

    /**
     * @param mixed $vote_average
     */
    public function setVoteAverage($vote_average)
    {
        $this->vote_average = $vote_average;
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
}