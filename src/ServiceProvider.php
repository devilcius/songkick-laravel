<?php

namespace Songkick;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
  protected $defer = false;

  public function boot()
  {
    $this->publishes([
        __DIR__.'/config/songkick.php' => config_path('songkick.php'),
    ]);
  }
}