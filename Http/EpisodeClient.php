<?php

namespace bogdanfinn\tmdbBundle\Http;

use bogdanfinn\tmdbBundle\Conversion\EpisodeTransformer;

/**
 * Client for accessing The Movie Database /tv-episodes endpoints
 * Documentation for the endpoints can be found at https://developers.themoviedb.org/3/tv-episodes
 *
 * All responses are deserialized JSON objects as stdClass or Modelinstances based on config
 */
class EpisodeClient
{
    /**
     * @var TMDbClient
     */
    private $tmdbClient;

    /**
     * @var EpisodeTransformer
     */
    private $episodeTransformer;

    /** @var  bool */
    private $useModels;

    /**
     * MovieClient constructor.
     * @param TmdbClient $tmdbClient
     * @param EpisodeTransformer $episodeTransformer
     * @param bool $useModels
     */
    public function __construct(TmdbClient $tmdbClient, EpisodeTransformer $episodeTransformer, $useModels = true)
    {
        $this->tmdbClient = $tmdbClient;
        $this->episodeTransformer = $episodeTransformer;
        $this->useModels = $useModels;
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

        return $this->transformEpisodeResponseToModels($this->tmdbClient->json("tv/$id/season/$season_number/episode/$episode_number", compact('language', 'append_to_response')));
    }

    /**
     * @param $apiResponse
     * @return mixed
     */
    private function transformEpisodeResponseToModels($apiResponse){
        if($this->useModels){
            return $this->episodeTransformer->assignEpisodeToModel($apiResponse);
        }
        return $apiResponse;
    }

}