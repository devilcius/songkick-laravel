<?php

namespace Songkick;

use GuzzleHttp\Client;

class SongkickCalendar {
  private $client;

  public function __construct($client)
  {
    $this->client = $client;
  }

  public function artistCalendar($artistID, $minDate = '', $maxDate = '', $order = 'asc', $page = 1, $perPage = 50)
  {
    if (!empty($minDate) && !empty($maxDate)) {
      return $this->client->get("artists/$artistID/calendar.json?min_date=$minDate&max_date=$maxDate&order=$order&page=$page&per_page=$perPage");
    } else {
      return $this->client->get("artists/$artistID/calendar.json?order=$order&page=$page&per_page=$perPage");
    }
  }

  public function venueCalendar($venueId, $page = 1, $perPage = 50)
  {
    return $this->client->get("venues/$venueId/calendar.json?page=1&per_page=$perPage");
  }

  public function metroAreaCalendar($metroAreaId, $page = 1, $perPage = 50)
  {
    return $this->client->get("metro_areas/$metroAreaId/calendar.json?page=$page&per_page=$perPage");
  }

  public function userCalendar($username, $order = 'asc', $page = 1, $perPage = 50)
  {
    return $this->client->get("users/$username/calendar.json?reason=attendance&order=$order&page=$page&per_page=$perPage");
  }
}
