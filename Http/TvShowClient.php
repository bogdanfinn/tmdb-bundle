<?php

namespace bogdanfinn\tmdbBundle\Http\tmdb;

use bogdanfinn\tmdbBundle\Http\TMDbClient;

/**
 * Client for accessing The Movie Database /tv endpoints
 * Documentation for the endpoints can be found at http://docs.themoviedb.apiary.io/#reference/tv
 *
 * All responses are deserialized JSON objects as stdClass (or array of stdClass)
 */
class TvClient
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
     * Get the primary information about a TV series by id.
     *
     * @link http://docs.themoviedb.apiary.io/#reference/tv/tvid
     *
     * @param string $id
     * @param string $language
     * @param array $append_to_response
     * @return \stdClass
     */
    public function getTvShow($id, $language = 'en', array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->tmdbClient->json("tv/$id", compact('language', 'append_to_response'));
    }

    /**
     * Search all TV shows by given query
     *
     * @link http://docs.themoviedb.apiary.io/#reference/search/searchtv
     *
     * @param string $query
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function searchTvShow($query, $language = 'en', $page = 1)
    {
        return $this->tmdbClient->json("search/tv", compact('language', 'query', 'page'));
    }

    /**
     * Get the list of TV shows that are currently on the air.
     * This query looks for any TV show that has an episode with an air date in the next 7 days.
     *
     * @link http://docs.themoviedb.apiary.io/#reference/tv/tvontheair
     *
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function getOnTheAir($language = 'en', $page = 1)
    {
        return $this->tmdbClient->json("tv/on_the_air", compact('language', 'page'));
    }

    /**
     * Get the list of TV shows that air today. Without a specified timezone,
     * this query defaults to EST (Eastern Time UTC-05:00).
     *
     * @link http://docs.themoviedb.apiary.io/#reference/tv/tvairingtoday
     *
     * @param string $timezone
     * @param string $language
     * @param int $page
     * @return \stdClass
     */
    public function getAiringToday($timezone = 'EST', $language = 'en', $page = 1)
    {
        return $this->tmdbClient->json("tv/airing_today", compact('timezone', 'language', 'page'));
    }

    /**
     * Get the primary information about a TV season by its season number
     *
     * @link https://developers.themoviedb.org/3/tv-seasons
     *
     * @param string|int $id
     * @param string|int $season_number
     * @param string $language
     * @param array $append_to_response
     * @return \stdClass
     */
    public function getSeason($id, $season_number, $language = 'en', array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->tmdbClient->json("tv/$id/season/$season_number", compact('language', 'append_to_response'));
    }

    /**
     * Get the primary information about a TV episode by its episode number
     *
     * @link https://developers.themoviedb.org/3/tv-episodes
     *
     * @param string|int $id
     * @param string|int $season_number
     * @param string|int $episode_number
     * @param string $language
     * @param array $append_to_response
     * @return \stdClass
     */
    public function getEpisode($id, $season_number, $episode_number, $language = 'en', array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        return $this->tmdbClient->json("tv/$id/season/$season_number/episode/$episode_number", compact('language', 'append_to_response'));
    }

    /**
     * Perform n concurrent requests at once for each season from 1 to n for given TV show
     * The returned array is zero-based, where the first field is the first season and so on;
     *  so the last key is n-1
     *
     * @link http://docs.themoviedb.apiary.io/#reference/tv-seasons/tvidseasonseasonnumber
     *
     * @param string|int $id
     * @param array $seasons
     * @param string $language
     * @param array $append_to_response
     * @return \stdClass[]
     */
    public function getNSeasons($id, $seasons, $language = 'en', array $append_to_response = [])
    {
        $append_to_response = $append_to_response ? implode(',', $append_to_response) : null;

        $requests = [];
        $queryParameters = compact('language', 'append_to_response');

        //Because some tv shows have seasons not in proper order.
        $countSeasons = count($seasons);

        for ($i = 0; $i < $countSeasons; $i++) {
            $seasonNumber = $seasons[$i]->season_number;
            $requests[] = $this->tmdbClient->json("tv/$id/season/$seasonNumber", $queryParameters, [], true);
        }

        return \GuzzleHttp\Promise\unwrap($requests);
    }

    /**
     * Get the similar TV shows for a specific tv id.
     *
     * @link http://docs.themoviedb.apiary.io/#reference/tv/tvidsimilar
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

        return $this->tmdbClient->json("tv/$id/similar", compact('id', 'language', 'page', 'append_to_response'));
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

        return $this->tmdbClient->json("tv/$id/recommendations", compact('id', 'language', 'page', 'append_to_response'));
    }
}
