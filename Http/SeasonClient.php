<?php

namespace bogdanfinn\tmdbBundle\Http;

use bogdanfinn\tmdbBundle\Conversion\SeasonTransformer;

/**
 * Client for accessing The Movie Database /tv-seasons endpoints
 * Documentation for the endpoints can be found at https://developers.themoviedb.org/3/tv-seasons
 *
 * All responses are deserialized JSON objects as stdClass or Modelinstances based on config
 */
class SeasonClient
{
    /**
     * @var TMDbClient
     */
    private $tmdbClient;

    /**
     * @var SeasonTransformer
     */
    private $seasonTransformer;

    /** @var  bool */
    private $useModels;

    /**
     * MovieClient constructor.
     * @param TmdbClient $tmdbClient
     * @param SeasonTransformer $seasonTransformer
     * @param bool $useModels
     */
    public function __construct(TmdbClient $tmdbClient, SeasonTransformer $seasonTransformer, $useModels = true)
    {
        $this->tmdbClient = $tmdbClient;
        $this->seasonTransformer = $seasonTransformer;
        $this->useModels = $useModels;
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

        return $this->transformSeasonResponseToModels($this->tmdbClient->json("tv/$id/season/$season_number", compact('language', 'append_to_response')));
    }

    /**
     * @param $apiResponse
     * @return mixed
     */
    private function transformSeasonResponseToModels($apiResponse){
        if($this->useModels){
            return $this->seasonTransformer->assignSeasonToModel($apiResponse);
        }
        return $apiResponse;
    }


}