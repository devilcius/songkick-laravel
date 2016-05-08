<?php

namespace Songkick;

use GuzzleHttp\Client;

class SongkickSearch {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function searchEvent($artistName = '', $lat = '', $long = '', $ipAddress = '', $page = 1, $perPage = 50)
  {
    if (!empty($artistName) && !empty($lat) && !empty($long)) {
      return $this->client->get("events.json?artist_name=$artistName&location=geo:$lat,$long&page=$page&per_page=$perPage");
    } else if (!empty($artistName) && !empty($ipAddress)) {
      return $this->client->get("events.json?artist_name=$artistName&location=ip:$ipAddress&page=$page&per_page=$perPage");
    } else {
      return $this->client->get("events.json?page=$page&per_page=$perPage");
    }
  }

  public function searchArtist($artistName, $page = 1, $perPage = 50)
  {
    return $this->client->get("search/artists.json?query=$artistName&page=$page&per_page=$perPage");
  }

  public function searchLocation($lat, $long, $ipAddress = '', $page = 1, $perPage = 50)
  {
    if (!empty($lat) && !empty($long)) {
      return $this->client->get("search/locations.json?location=geo:$lat,$long&page=$page&per_page=$perPage");
    } else if (!empty($ipAddress)) {
      return $this->client->get("search/locations.json?location=ip:$ipAddress&page=$page&per_page=$perPage");
    }
  }

  public function searchVenue($venueName, $page = 1, $perPage = 50)
  {
    return $this->client->get("search/venues.json?query=$venueName&page=$page&per_page=$perPage");
  }

  public function searchSimilarArtists($artistId, $page = 1, $perPage = 50)
  {
    return $this->client->get("artists/$artistId/similar_artists.json?page=$page&per_page=$perPage");
  }
}