<?php

namespace bogdanfinn\TmdbBundle\Model;

class TvShow
{
    private $id;
    private $name;
    private $original_name;
    private $overview;
    private $vote_count;
    private $original_language;
    private $poster_path;
    private $first_air_date;
    private $backdrop_path;
    private $popularity;
    private $vote_average;
    private $genre_ids;
    private $origin_country;
    private $type;
    private $status;
    private $created_by;
    private $episode_run_time;
    private $genres;
    private $homepage;
    private $in_production;
    private $languages;
    private $last_air_date;
    private $networks;
    private $number_of_episodes;
    private $number_of_seasons;
    private $production_companies;
    private $seasons;

    /**
     * TvShow constructor.
     * @param $apiTvShow
     */
    public function __construct($apiTvShow)
    {
        foreach ($apiTvShow as $key => $val) {
            if (property_exists(__CLASS__, $key)) {
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
    public function getOriginalName()
    {
        return $this->original_name;
    }

    /**
     * @param mixed $original_name
     */
    public function setOriginalName($original_name)
    {
        $this->original_name = $original_name;
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
    public function getOriginalLanguage()
    {
        return $this->original_language;
    }

    /**
     * @param mixed $original_language
     */
    public function setOriginalLanguage($original_language)
    {
        $this->original_language = $original_language;
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
    public function getFirstAirDate()
    {
        return $this->first_air_date;
    }

    /**
     * @param mixed $first_air_date
     */
    public function setFirstAirDate($first_air_date)
    {
        $this->first_air_date = $first_air_date;
    }

    /**
     * @return mixed
     */
    public function getBackdropPath()
    {
        return $this->backdrop_path;
    }

    /**
     * @param mixed $backdrop_path
     */
    public function setBackdropPath($backdrop_path)
    {
        $this->backdrop_path = $backdrop_path;
    }

    /**
     * @return mixed
     */
    public function getPopularity()
    {
        return $this->popularity;
    }

    /**
     * @param mixed $popularity
     */
    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;
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
    public function getGenreIds()
    {
        return $this->genre_ids;
    }

    /**
     * @param mixed $genre_ids
     */
    public function setGenreIds($genre_ids)
    {
        $this->genre_ids = $genre_ids;
    }

    /**
     * @return mixed
     */
    public function getOriginCountry()
    {
        return $this->origin_country;
    }

    /**
     * @param mixed $origin_country
     */
    public function setOriginCountry($origin_country)
    {
        $this->origin_country = $origin_country;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * @param mixed $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * @return mixed
     */
    public function getEpisodeRunTime()
    {
        return $this->episode_run_time;
    }

    /**
     * @param mixed $episode_run_time
     */
    public function setEpisodeRunTime($episode_run_time)
    {
        $this->episode_run_time = $episode_run_time;
    }

    /**
     * @return mixed
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param mixed $genres
     */
    public function setGenres($genres)
    {
        $this->genres = $genres;
    }

    /**
     * @return mixed
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @param mixed $homepage
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    /**
     * @return mixed
     */
    public function getInProduction()
    {
        return $this->in_production;
    }

    /**
     * @param mixed $in_production
     */
    public function setInProduction($in_production)
    {
        $this->in_production = $in_production;
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param mixed $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return mixed
     */
    public function getLastAirDate()
    {
        return $this->last_air_date;
    }

    /**
     * @param mixed $last_air_date
     */
    public function setLastAirDate($last_air_date)
    {
        $this->last_air_date = $last_air_date;
    }

    /**
     * @return mixed
     */
    public function getNetworks()
    {
        return $this->networks;
    }

    /**
     * @param mixed $networks
     */
    public function setNetworks($networks)
    {
        $this->networks = $networks;
    }

    /**
     * @return mixed
     */
    public function getNumberOfEpisodes()
    {
        return $this->number_of_episodes;
    }

    /**
     * @param mixed $number_of_episodes
     */
    public function setNumberOfEpisodes($number_of_episodes)
    {
        $this->number_of_episodes = $number_of_episodes;
    }

    /**
     * @return mixed
     */
    public function getNumberOfSeasons()
    {
        return $this->number_of_seasons;
    }

    /**
     * @param mixed $number_of_seasons
     */
    public function setNumberOfSeasons($number_of_seasons)
    {
        $this->number_of_seasons = $number_of_seasons;
    }

    /**
     * @return mixed
     */
    public function getProductionCompanies()
    {
        return $this->production_companies;
    }

    /**
     * @param mixed $production_companies
     */
    public function setProductionCompanies($production_companies)
    {
        $this->production_companies = $production_companies;
    }

    /**
     * @return mixed
     */
    public function getSeasons()
    {
        return $this->seasons;
    }

    /**
     * @param mixed $seasons
     */
    public function setSeasons($seasons)
    {
        $this->seasons = $seasons;
    }

}