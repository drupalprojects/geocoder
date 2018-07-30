<?php

namespace Drupal\geocoder\Plugin\Geocoder\Provider;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\geocoder\ProviderUsingHandlerWithAdapterBase;
use Http\Client\HttpClient;

/**
 * Geocoder provider plugin for Google Maps for Business.
 *
 * @GeocoderProvider(
 *   id = "googlemaps_business",
 *   name = "GoogleMapsBusiness",
 *   handler = "\Geocoder\Provider\GoogleMaps\GoogleMaps",
 *   arguments = {
 *     "clientId" = "",
 *     "privateKey" = "",
 *     "region" = "",
 *     "apiKey" = "",
 *     "channel" = ""
 *   }
 * )
 */
class GoogleMapsBusiness extends ProviderUsingHandlerWithAdapterBase {

  public function __construct(array $configuration, string $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory, CacheBackendInterface $cache_backend, HttpClient $http_adapter) {
    throw new \Exception('Google Maps for Business needs to be instantiated by calling \Geocoder\Provider\GoogleMaps\GoogleMaps::business()');
  }
}
