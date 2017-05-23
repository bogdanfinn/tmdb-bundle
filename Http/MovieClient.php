<?php

namespace bogdanfinn\tmdbBundle\Http\tmdb;


use bogdanfinn\tmdbBundle\Http\TMDbClient;

class MovieClient
{
    /**
     * @var TMDbClient
     */
    private $tmdbClient;

    /**
     * @param TMDbClient $tmdbClient
     */
    public function __construct(TMDbClient $tmdbClient)
    {
        $this->tmdbClient = $tmdbClient;
    }

    /**
     * Get the basic movie information for a specific movie id.
     *
     * @link http://docs.themoviedb.apiary.io/#reference/movies
     *
     * @param int $id
     * @param string $language
     * @param array $append_to_response
     * @return \stdClass
     */
    public function getMovie($id, $language = 'en', array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->tmdbClient->json("movie/$id", compact('language', 'append_to_response'));
    }

    /**
     * Search all movies by given query
     *
     * @link http://docs.themoviedb.apiary.io/#reference/search/searchmovie
     *
     * @param string $query
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function searchMovie($query, $language = 'en', $page = 1)
    {
        return $this->tmdbClient->json("search/movie", compact('language', 'query', 'page'));
    }

    /**
     * Get the list of upcoming movies by release date. This list refreshes every day.
     *
     * @link http://docs.themoviedb.apiary.io/#reference/movies/movieupcoming
     *
     * @param string $language
     * @param int $page
     * @param string $region
     * @return \stdClass
     */
    public function getUpcomingMovies($language = 'en', $page = 1, $region = 'DE')
    {
        return $this->tmdbClient->json("movie/upcoming", compact('language', 'page', 'region'));
    }

    /**
     * Get the similar movies for a specific movie id.
     *
     * @link http://docs.themoviedb.apiary.io/#reference/movies/movieidsimilar
     *
     * @param int $id
     * @param string $language
     * @param int $page
     * @param array $append_to_response
     * @return \stdClass
     */
    public function getSimilarMovies($id, $language = 'en', $page = 1, array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->tmdbClient->json("movie/$id/similar", compact('language', 'page', 'append_to_response'));
    }

    /**
     * Get Recommendations for a specific movie id.
     *
     * @link https://developers.themoviedb.org/3/movies/get-movie-recommendations
     *
     * @param int $id
     * @param string $language
     * @param int $page
     * @param array $append_to_response
     * @return \stdClass
     */
    public function getRecommendations($id, $language = 'en', $page = 1, array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->tmdbClient->json("movie/$id/recommendations", compact('language', 'page', 'append_to_response'));
    }
}
