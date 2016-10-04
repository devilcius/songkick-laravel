# Songkick API client built on top of Guzzle 6 for Laravel 5
[![Code Climate](https://codeclimate.com/github/wildlifechorus/songkick-laravel/badges/gpa.svg)](https://codeclimate.com/github/wildlifechorus/songkick-laravel) [![Test Coverage](https://codeclimate.com/github/wildlifechorus/songkick-laravel/badges/coverage.svg)](https://codeclimate.com/github/wildlifechorus/songkick-laravel/coverage)

I made this for **[Tradiio](https://tradiio.com)**, but I think more people could use it :)

Apply for a **[Songkick](http://www.songkick.com/)** API Key [here](http://www.songkick.com/api_key_requests/new).

Powered by **[Songkick](http://www.songkick.com/)**

## Install

The recommended way to install is through
[Composer](http://getcomposer.org).

Run the [Composer](http://getcomposer.org/) command to install the latest version on [Packagist](https://packagist.org/packages/wildlifechorus/songkick-laravel):

```bash
composer require wildlifechorus/songkick-laravel
```

You must install this service provider:

```bash
// Laravel 5: config/app.php
'providers' => [
    //...
    Songkick\ServiceProvider::class,
    //...
];
```

Then publish the config file of the package using artisan.

```bash
php artisan vendor:publish --provider="Songkick\ServiceProvider"
```

## Client

```php
$client = new SongkickClient();
```

## Search

```php
// http://www.songkick.com/developer/artist-search
// Search Artists (ex: 'O Quarto Fantasma')
$client->search->searchArtist(artistName, page, perPage);

// http://www.songkick.com/developer/event-search
// Search Event
$client->search->searchEvent(artistName, lat, long, ipAddress, page, perPage);

// http://www.songkick.com/developer/location-search
// Search Location
$client->search->searchLocation(lat, long, ipAddress, page, perPage);

// http://www.songkick.com/developer/venue-search
// Search Venue
$client->search->searchVenue(venueName, page, perPage);

// http://www.songkick.com/developer/similar-artists
// Search Similar Artists
$client->search->searchSimilarArtists(artistId, page, perPage);
```

## Calendar

```php
// http://www.songkick.com/developer/upcoming-events-for-artist
// Get Artist Calendar
$client->calendar->artistCalendar(artistID, minDate, maxDate, order, page, perPage);

// http://www.songkick.com/developer/upcoming-events-for-venue
// Get Venue Calendar
$client->calendar->venueCalendar(venueID, page, perPage);

// http://www.songkick.com/developer/upcoming-events-for-metro-area
// Get Metro Area Calendar
$client->calendar->metroAreaCalendar(metroAreaId, page, perPage);

// http://www.songkick.com/developer/upcoming-events-for-user
// Get User Calendar
$client->calendar->userCalendar(username, order, page, perPage);
```

## Gigography

```php
// http://www.songkick.com/developer/past-events-for-artist
// Get Artist Gigography
$client->gigography->artistGigography(artistId, minDate, maxDate, order, page, perPage);

// http://www.songkick.com/developer/past-events-for-user
// Get User Gigography
$client->gigography->userGigography(username, order, page, perPage);
```

## Details

```php
// http://www.songkick.com/developer/events-details
// Get Event Details
$client->details->eventDetails(eventId, page, perPage);

// http://www.songkick.com/developer/venue-details
// Get Venue Details
$client->details->venueDetails(venueId, page, perPage);
```

## Setlists

```php
// http://www.songkick.com/developer/setlists
// Get Event's Setlists
$client->setlists->eventSetlists(eventId, page, perPage);
```

## Copyleft and License :poop:

Copyleft 2016

This project is licensed under the **["THE BEER-WARE LICENSE" (Revision 42)](http://www.cs.trincoll.edu/hfoss/wiki/Chris_Fei:_Beerware_License)**.
