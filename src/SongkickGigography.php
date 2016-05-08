<?php

namespace Songkick;

use GuzzleHttp\Client;

class SongkickGigography {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function artistGigography($artistId, $minDate = '', $maxDate = '', $order = 'asc', $page = 1, $perPage = 50)
  {
    if (!empty($minDate) && !empty($maxDate)) {
      return $this->client->get("artists/$artistId/gigography.json?min_date=$minDate&max_date=$maxDate&order=$order&page=$page&per_page=$perPage");
    } else {
      return $this->client->get("artists/$artistId/gigography.json?order=$order&page=$page&per_page=$perPage");
    }
  }

  public function userGigography($username, $order = 'asc', $page = 1, $perPage = 50)
  {
    return $this->client->get("users/$username/gigography.json?order=$order&page=$page&per_page=$perPage");
  }
}
