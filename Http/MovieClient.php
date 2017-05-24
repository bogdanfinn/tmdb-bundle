<?php

namespace bogdanfinn\TmdbBundle\Http;



use bogdanfinn\TmdbBundle\Conversion\MovieTransformer;

/**
 * Client for accessing The Movie Database /movies endpoints
 * Documentation for the endpoints can be found at https://developers.themoviedb.org/3/movies
 *https://developers.themoviedb.org/3/search
 * All responses are deserialized JSON objects as stdClass or Modelinstances based on config
 */
class MovieClient
{
    /**
     * @var TMDbClient
     */
    private $tmdbClient;

    /**
     * @var MovieTransformer
     */
    private $movieTransformer;

    /** @var  bool */
    private $useModels;

    /**
     * @var SearchClient
     */
    private $searchClient;

    /**
     * MovieClient constructor.
     * @param TmdbClient $tmdbClient
     * @param MovieTransformer $movieTransformer
     * @param bool $useModels
     * @param SearchClient $searchClient
     */
    public function __construct(TmdbClient $tmdbClient, MovieTransformer $movieTransformer, $useModels = true, SearchClient $searchClient)
    {
        $this->tmdbClient = $tmdbClient;
        $this->searchClient = $searchClient;
        $this->movieTransformer = $movieTransformer;
        $this->useModels = $useModels;
    }

    /**
     * Get the basic movie information for a specific movie id.
     *
     * @link https://developers.themoviedb.org/3/movies/get-movie-details
     *
     * @param int $id
     * @param string $language
     * @param array $append_to_response
     * @return \stdClass
     */
    public function getMovie($id, $language = 'en', array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->transformMovieResponseToModels($this->tmdbClient->json("movie/$id", compact('language', 'append_to_response')));
    }

    /**
     * Search all movies by given query
     *
     * @link https://developers.themoviedb.org/3/search/search-movies
     *
     * @param string $query
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function searchMovie($query, $language = 'en', $page = 1)
    {
        return $this->searchClient->searchMovie($query, $language = 'en', $page = 1);
    }

    /**
     * Get the list of upcoming movies by release date. This list refreshes every day.
     *
     * @link https://developers.themoviedb.org/3/movies/get-upcoming
     *
     * @param string $language
     * @param int $page
     * @param string $region
     * @return \stdClass
     */
    public function getUpcomingMovies($language = 'en', $page = 1, $region = 'DE')
    {
        return $this->transformMovieResponseToModels($this->tmdbClient->json("movie/upcoming", compact('language', 'page', 'region')));
    }

    /**
     * Get the similar movies for a specific movie id.
     *
     * @link https://developers.themoviedb.org/3/movies/get-similar-movies
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

        return $this->transformMovieResponseToModels($this->tmdbClient->json("movie/$id/similar", compact('language', 'page', 'append_to_response')));
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

        return $this->transformMovieResponseToModels($this->tmdbClient->json("movie/$id/recommendations", compact('language', 'page', 'append_to_response')));
    }

    /**
     * @param $apiResponse
     * @return mixed
     */
    private function transformMovieResponseToModels($apiResponse){
        if($this->useModels){
            return $this->movieTransformer->assignMovieToModel($apiResponse);
        }
        return $apiResponse;
    }
}
