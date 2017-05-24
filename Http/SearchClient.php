<?php

namespace bogdanfinn\TmdbBundle\Http;



use bogdanfinn\TmdbBundle\Conversion\EpisodeTransformer;
use bogdanfinn\TmdbBundle\Conversion\MovieTransformer;
use bogdanfinn\TmdbBundle\Conversion\SearchTransformer;
use bogdanfinn\TmdbBundle\Conversion\SeasonTransformer;
use bogdanfinn\TmdbBundle\Conversion\TvShowTransformer;
use bogdanfinn\TmdbBundle\Model\TvShow;

/**
 * Client for accessing The Movie Database /search endpoints
 * Documentation for the endpoints can be found at https://developers.themoviedb.org/3/search
 *
 * All responses are deserialized JSON objects as stdClass or Modelinstances based on config
 */
class SearchClient
{
    /**
     * @var TMDbClient
     */
    private $tmdbClient;

    /**
     * @var MovieTransformer
     */
    private $movieTransformer;

    /**
     * @var TvShowTransformer
     */
    private $tvShowTransformer;

    /**
     * @var EpisodeTransformer
     */
    private $episodeTransformer;

    /**
     * @var SeasonTransformer
     */
    private $seasonTransformer;

    /**
     * @var SearchTransformer
     */
    private $searchTransformer;

    /** @var  bool */
    private $useModels;

    /**
     * SearchClient constructor.
     * @param TmdbClient $tmdbClient
     * @param MovieTransformer $movieTransformer
     * @param TvShowTransformer $tvShowTransformer
     * @param SeasonTransformer $seasonTransformer
     * @param EpisodeTransformer $episodeTransformer
     * @param SearchTransformer $searchTransformer
     * @param bool $useModels
     */
    public function __construct(TmdbClient $tmdbClient, MovieTransformer $movieTransformer, TvShowTransformer $tvShowTransformer, SeasonTransformer $seasonTransformer, EpisodeTransformer $episodeTransformer, SearchTransformer $searchTransformer, $useModels = true)
    {
        $this->tmdbClient = $tmdbClient;
        $this->movieTransformer = $movieTransformer;
        $this->tvShowTransformer = $tvShowTransformer;
        $this->seasonTransformer = $seasonTransformer;
        $this->episodeTransformer = $episodeTransformer;
        $this->searchTransformer = $searchTransformer;
        $this->useModels = $useModels;
    }

    /**
     * Search all TV shows by given query
     *
     * @link https://developers.themoviedb.org/3/search/search-tv-shows
     *
     * @param string $query
     * @param string $language
     * @param int $page
     * @return TvShow[] | \stdClass
     */
    public function searchTvShow($query, $language = 'en', $page = 1)
    {
        return $this->transformTvShowResponseToModels($this->tmdbClient->json("search/tv", compact('language', 'query', 'page')));
    }

    /**
     * Search all resources via multisearch
     *
     * https://developers.themoviedb.org/3/search/multi-search
     *
     * @param string $query
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function multiSearch($query, $language = 'en', $page = 1)
    {
        return $this->transformMultiSearchResponseToModels($this->tmdbClient->json("search/multi", compact('language', 'query', 'page')));
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
        return $this->transformMovieResponseToModels($this->tmdbClient->json("search/movie", compact('language', 'query', 'page')));
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

    /**
     * @param $apiResponse
     * @return mixed
     */
    private function transformTvShowResponseToModels($apiResponse){
        if($this->useModels){
            return $this->tvShowTransformer->assignTvShowToModel($apiResponse);
        }
        return $apiResponse;
    }

    /**
     * @param $apiResponse
     * @return mixed
     */
    private function transformMultiSearchResponseToModels($apiResponse){
        if($this->useModels){
            return $this->searchTransformer->assignMultiSearchToModel($apiResponse);
        }

        return $apiResponse;
    }
}
