<?php

namespace bogdanfinn\tmdbBundle\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * HTTP client for accessing The Movie Database API loosely wrapped around Guzzle
 * Document for the API can be found at TODO: Insert Link
 */
class TmdbClient
{

    /**
     * Base URL to the API Version 3
     * Using always the SSL version because why not
     */
    const TMDB_API_BASE_URL = 'https://api.themoviedb.org/3/';

    /**
     * @var GuzzleClient
     */
    private $httpClient;

    /**
     * The API key for accessing the movie db
     *
     * @var string
     */
    private $apiKey;

    /**
     * @param string $apiKey The API key for accessing the movie db
     * @param array $guzzleConfig Additional Guzzle configuration
     */
    public function __construct($apiKey, array $guzzleConfig = [])
    {
        $this->apiKey = $apiKey;

        // set some default values to the configuration
        $config = [
            'base_uri' => self::TMDB_API_BASE_URL
        ];

        $this->httpClient = new GuzzleClient($config);
    }

    /**
     * Send a request to the movie database
     * Omit the base-url as it will always be prepended
     *
     * @param string $method
     * @param string $uri
     * @param array $query
     * @param array $headers
     * @param bool $async
     * @return \Psr\Http\Message\ResponseInterface|PromiseInterface
     */
    public function send($method, $uri, array $query = [], array $headers = [], $async = false)
    {
        if ($this->apiKey && !isset($query['api_key'])) {
            $query['api_key'] = $this->apiKey;
        }

        $uri .= '?' . http_build_query($query);

        $promise = $this->httpClient->requestAsync($method, $uri, ['headers' => $headers]);

        return $async ? $promise : $promise->wait();
    }

    /**
     * Perform a simple HTTP GET request that returns a deserialized JSON object
     *
     * @param string $uri
     * @param array $query
     * @param array $headers
     * @param bool $async
     * @return \stdClass
     */
    public function json($uri, array $query = [], array $headers = [], $async = false)
    {
        // always request json mime as response
        $headers = ['Accept' => 'application/json'] + $headers;

        /** @var PromiseInterface $responsePromise */
        $responsePromise = $this->send('GET', $uri, $query, $headers, true);

        // pass-through the failed invocation
        $jsonPromise = $responsePromise->then(function (ResponseInterface $response) {
            return json_decode($response->getBody()->getContents());
        });

        if ($async) {
            return $jsonPromise;
        } else {
            return $jsonPromise->wait();
        }
    }
}
