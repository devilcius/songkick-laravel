<?php

namespace Songkick;

use GuzzleHttp\Client;

class SongkickDetails {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function eventDetails($eventId, $page = 1, $perPage = 50)
  {
    return $this->client->get("events/$eventId.json?page=$page&per_page=$perPage");
  }

  public function venueDetails($venueId, $page = 1, $perPage = 50)
  {
    return $this->client->get("venues/$venueId.json?page=$page&per_page=$perPage");
  }
}
