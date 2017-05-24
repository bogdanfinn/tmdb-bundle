<?php

namespace bogdanfinn\TmdbBundle\Model;

class Movie
{
    private $id;
    private $adult;
    private $backdrop_path;
    private $belongs_to_collection;
    private $budget;
    private $genres;
    private $title;
    private $homepage;
    private $imdb_id;
    private $original_language;
    private $original_title;
    private $overview;
    private $popularity;
    private $poster_path;
    private $production_companies;
    private $production_countries;
    private $release_date;
    private $revenue;
    private $runtime;
    private $spoken_lanugages;
    private $status;
    private $tagline;
    private $video;
    private $vote_average;
    private $vote_count;

    /**
     * Movie constructor.
     * @param $apiMovie
     */
    public function __construct($apiMovie)
    {
        foreach($apiMovie as $key => $val) {
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
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * @param mixed $adult
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;
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
    public function getBelongsToCollection()
    {
        return $this->belongs_to_collection;
    }

    /**
     * @param mixed $belongs_to_collection
     */
    public function setBelongsToCollection($belongs_to_collection)
    {
        $this->belongs_to_collection = $belongs_to_collection;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
    public function getImdbId()
    {
        return $this->imdb_id;
    }

    /**
     * @param mixed $imdb_id
     */
    public function setImdbId($imdb_id)
    {
        $this->imdb_id = $imdb_id;
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
    public function getOriginalTitle()
    {
        return $this->original_title;
    }

    /**
     * @param mixed $original_title
     */
    public function setOriginalTitle($original_title)
    {
        $this->original_title = $original_title;
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
    public function getProductionCountries()
    {
        return $this->production_countries;
    }

    /**
     * @param mixed $production_countries
     */
    public function setProductionCountries($production_countries)
    {
        $this->production_countries = $production_countries;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * @param mixed $release_date
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }

    /**
     * @return mixed
     */
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * @param mixed $revenue
     */
    public function setRevenue($revenue)
    {
        $this->revenue = $revenue;
    }

    /**
     * @return mixed
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * @param mixed $runtime
     */
    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;
    }

    /**
     * @return mixed
     */
    public function getSpokenLanugages()
    {
        return $this->spoken_lanugages;
    }

    /**
     * @param mixed $spoken_lanugages
     */
    public function setSpokenLanugages($spoken_lanugages)
    {
        $this->spoken_lanugages = $spoken_lanugages;
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
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * @param mixed $tagline
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;
    }

    /**
     * @return mixed
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param mixed $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
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
}