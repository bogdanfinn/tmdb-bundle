# bogdanfinn/tmdb-bundle
A symfony bundle for accessing the https://www.themoviedb.org/ Api


### The Bundle is currently work in progress!



Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require bogdanfinn/tmdb-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle / Configuration
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```
<?php
// app/AppKernel.php
// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new bogdanfinn\tmdbBundle\tmdbBundle(),
        );

        // ...
    }

    // ...
}
```

Add to your `app/config/config.yml` the following:

```
tmdb:
    api_key: "API_KEY_HERE"
    use_models: true 
```
If use set `use_models` to `true` the Services return Model instances of Movies, TvShows, Episodes and Seasons located under `bogdanfinn/tmdbBundle/Model`. If you set `use_models` to `false` the services return JSON objects. 

Step 3: Usage
----------------

Get the TvShowClient in your Controller

```
$tvShowClient = $this->get('tmdb_tvshow_client');
```

Get the MovieClient in your Controller

```
$movieClient = $this->get('tmdb_movie_client');
```

Get the EpisodeClient in your Controller

```
$episodeClient = $this->get('tmdb_episode_client');
```

Get the SeasonClient in your Controller

```
$seasonClient = $this->get('tmdb_season_client');
```

Get the SearchClient in your Controller

```
$searchClient = $this->get('tmdb_search_client');
```


### Methods

##### Get Information for another language

You can set the language in the ClientMethod as second parameter. The default language is always `en`.

```
$response = $client->method($firstParameter, 'de');
$response = $client->method($firstParameter, 'de');
```

#### TvShowClient

```
$tvShowsSearchResults = $tvShowClient->searchTvShow('The Walking Dead');
$tvShow = $tvShowClient->getTvShow(1402);
$todayAiringShows = $tvShowClient->getAiringToday();
$onTheAirShows = $tvShowClient->getOnTheAir();
$season = $tvShowClient->getSeason(1402, 1);
$episode = $tvShowClient->getEpisode(1402, 1, 1);
$tvShowRecommendations = $tvShowClient->getRecommendations(1402);
$similarTvShows = $tvShowClient->getSimilarTvShows(1402);           
```

#### SeasonClient

```
//Parameter: tvShowId, seasonNumber
$season = $seasonClient->getSeason(1402, 1); 
```

#### EpisodeClient

```
//Parameter: tvShowId, seasonNumber, episodeNumber
$episode = $episodeClient->getEpisode(1402, 1, 1); 
```


#### MovieClient

```
$movieRecommendations = $movieClient->getRecommendations(13);
$movie = $movieClient->getMovie(13);
$movieSearchResults = $movieClient->searchMovie('Forrest Gump');
$similarMovies = $movieClient->getSimilarMovies(13);
$upcomingMovies = $movieClient->getUpcomingMovies();
```

#### SearchClient

```
$movieSearchResults = $searchClient->searchMovie('Forrest Gump');
$tvShowSearchResults = $searchClient->searchTvShow('The Walking Dead');

//Movies, TvShows and Persons
$multiSearchResults = $searchClient->multiSearch('Wesley');
```
