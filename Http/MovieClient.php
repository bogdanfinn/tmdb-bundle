<?php

namespace bogdanfinn\tmdbBundle\Http;



use bogdanfinn\tmdbBundle\Conversion\MovieTransformer;

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
     * MovieClient constructor.
     * @param TmdbClient $tmdbClient
     * @param MovieTransformer $movieTransformer
     * @param bool $useModels
     */
    public function __construct(TmdbClient $tmdbClient, MovieTransformer $movieTransformer, $useModels = true)
    {
        $this->tmdbClient = $tmdbClient;
        $this->movieTransformer = $movieTransformer;
        $this->useModels = $useModels;
    }

    /**
     * Get the basic movie information for a specific movie id.
     *
     * @link TODO
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
     * @link TODO
     *
     * @param string $query
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function searchMovie($query, $language = 'en', $page = 1)
    {
        return $this->transformMovieResponseToModels($this->tmdbClient->json("search/movie", compact('language', 'query', 'page')));
    }

    /**
     * Get the list of upcoming movies by release date. This list refreshes every day.
     *
     * @link TODO
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
     * @link TODO
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
     * @link TODO
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
