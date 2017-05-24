<?php

namespace bogdanfinn\TmdbBundle\Model;


class Person
{
    private $adult;
    private $also_known_as;
    private $biography;
    private $birthday;
    private $known_for;
    private $deathday;
    private $gender;
    private $homepage;
    private $id;
    private $imdb_id;
    private $name;
    private $place_of_birth;
    private $popularity;
    private $profile_path;

    /**
     * Person constructor.
     * @param $apiPerson
     */
    public function __construct($apiPerson)
    {
        foreach ($apiPerson as $key => $val) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $val;
            }
        }
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
    public function getAlsoKnownAs()
    {
        return $this->also_known_as;
    }

    /**
     * @param mixed $also_known_as
     */
    public function setAlsoKnownAs($also_known_as)
    {
        $this->also_known_as = $also_known_as;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param mixed $biography
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getDeathday()
    {
        return $this->deathday;
    }

    /**
     * @param mixed $deathday
     */
    public function setDeathday($deathday)
    {
        $this->deathday = $deathday;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
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
    public function getPlaceOfBirth()
    {
        return $this->place_of_birth;
    }

    /**
     * @param mixed $place_of_birth
     */
    public function setPlaceOfBirth($place_of_birth)
    {
        $this->place_of_birth = $place_of_birth;
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
    public function getProfilePath()
    {
        return $this->profile_path;
    }

    /**
     * @param mixed $profile_path
     */
    public function setProfilePath($profile_path)
    {
        $this->profile_path = $profile_path;
    }

    /**
     * @return mixed
     */
    public function getKnownFor()
    {
        return $this->known_for;
    }

    /**
     * @param mixed $known_for
     */
    public function setKnownFor($known_for)
    {
        $this->known_for = $known_for;
    }
}