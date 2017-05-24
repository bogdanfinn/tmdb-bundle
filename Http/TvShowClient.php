<?php

namespace bogdanfinn\TmdbBundle\Http;

use bogdanfinn\TmdbBundle\Conversion\TvShowTransformer;
use bogdanfinn\TmdbBundle\Model\TvShow;

/**
 * Client for accessing The Movie Database /tv endpoints
 * Documentation for the endpoints can be found at https://developers.themoviedb.org/3/tv
 *
 * All responses are deserialized JSON objects as stdClass or Modelinstances based on config
 */
class TvShowClient
{

    /**
     * @var TMDbClient
     */
    private $tmdbClient;

    /**
     * @var TvShowTransformer
     */
    private $tvShowTransformer;

    /**
     * @var bool
     */
    private $useModels;

    /**
     * @var SearchClient
     */
    private $searchClient;

    /**
     * TvShowClient constructor.
     * @param TmdbClient $tmdbClient
     * @param TvShowTransformer $tvShowTransformer
     * @param bool $useModels
     * @param SearchClient $searchClient
     */
    public function __construct(TmdbClient $tmdbClient, TvShowTransformer $tvShowTransformer, $useModels = true, SearchClient $searchClient)
    {
        $this->tmdbClient = $tmdbClient;
        $this->tvShowTransformer = $tvShowTransformer;
        $this->useModels = $useModels;
        $this->searchClient = $searchClient;
    }

    /**
     * Get the primary information about a TV series by id.
     *
     * @link https://developers.themoviedb.org/3/tv/get-tv-details
     *
     * @param string $id
     * @param string $language
     * @param array $append_to_response
     * @return TvShow | \stdClass
     */
    public function getTvShow($id, $language = 'en', array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->transformTvShowResponseToModels($this->tmdbClient->json("tv/$id", compact('language', 'append_to_response')));
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
        return $this->searchClient->searchTvShow($query, $language = 'en', $page = 1);
    }

    /**
     * Get the list of TV shows that are currently on the air.
     * This query looks for any TV show that has an episode with an air date in the next 7 days.
     *
     * @link https://developers.themoviedb.org/3/tv/get-tv-on-the-air
     *
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function getOnTheAir($language = 'en', $page = 1)
    {
        return $this->transformTvShowResponseToModels($this->tmdbClient->json("tv/on_the_air", compact('language', 'page')));
    }

    /**
     * Get the list of TV shows that air today. Without a specified timezone,
     * this query defaults to EST (Eastern Time UTC-05:00).
     *
     * @link https://developers.themoviedb.org/3/tv/get-tv-airing-today
     *
     * @param string $timezone
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function getAiringToday($timezone = 'EST', $language = 'en', $page = 1)
    {
        return $this->transformTvShowResponseToModels($this->tmdbClient->json("tv/airing_today", compact('timezone', 'language', 'page')));
    }

    /**
     * Get the similar TV shows for a specific tv id.
     *
     * @link https://developers.themoviedb.org/3/tv/get-similar-tv-shows
     *
     * @param int $id
     * @param string $language
     * @param int $page
     * @param array $append_to_response
     * @return \stdClass
     */
    public function getSimilarTvShows($id, $language = 'en', $page = 1, array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->transformTvShowResponseToModels($this->tmdbClient->json("tv/$id/similar", compact('id', 'language', 'page', 'append_to_response')));
    }

    /**
     * Get Recommendations for a specific tv id.
     *
     * @link https://developers.themoviedb.org/3/tv/get-tv-recommendations
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

        return $this->transformTvShowResponseToModels($this->tmdbClient->json("tv/$id/recommendations", compact('id', 'language', 'page', 'append_to_response')));
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
}
