<?php

namespace Songkick;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;

class SongkickClient {

  private $http_client;

  protected $apiKey;

  public $search;

  public $calendar;

  public $gigography;

  public $setlists;

  public $details;

  public function __construct()
  {
    $this->setDefaultClient();
    $this->search = new SongkickSearch($this);
    $this->calendar = new SongkickCalendar($this);
    $this->gigography = new SongkickGigography($this);
    $this->setlists = new SongkickSetlists($this);
    $this->details = new SongkickDetails($this);

    $this->apiKey = config('songkick.api_key');
  }

  private function setDefaultClient()
  {
    $this->http_client = new Client();
  }

  public function setClient($client)
  {
    $this->http_client = $client;
  }

  public function get($query)
  {
    $response = $this->http_client->request('GET', "http://api.songkick.com/api/3.0/$query&apikey=".$this->getApiKey(), [
      'headers' => [
        'Accept' => 'application/json'
      ]
    ]);

    return $this->handleResponse($response);
  }

  public function getApiKey()
  {
    return $this->apiKey;
  }

  private function handleResponse(Response $response){
    $stream = stream_for($response->getBody());
    $data = json_decode($stream->getContents());
    return $data;
  }
}
