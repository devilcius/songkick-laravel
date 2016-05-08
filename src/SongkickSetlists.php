<?php

namespace Songkick;

use GuzzleHttp\Client;

class SongkickSetlists {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function eventSetlists($eventId, $page = 1, $perPage = 50)
  {
    return $this->client->get("events/$eventId/setlists.json?page=$page&per_page=$perPage");
  }
}
