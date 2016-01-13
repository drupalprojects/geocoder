<?php
/**
 * @file
 * The FreeGeoIp plugin.
 */

namespace Drupal\geocoder\Plugin\GeocoderProvider;

use Drupal\geocoder\GeocoderProvider\GeocoderProvider;
use Geocoder\Geocoder;
use Geocoder\Provider\Provider;

/**
 * Class FreeGeoIp.
 *
 * @GeocoderProviderPlugin(
 *  id = "FreeGeoIp",
 *  arguments = {
 *   "@geocoder.http_adapter",
 *   "@logger.channel.default",
 *   "@messenger"
 *  }
 * )
 */
class FreeGeoIp extends GeocoderProvider {
  /**
   * @inheritdoc
   */
  public function init() {
    $this->setHandler(new \Geocoder\Provider\FreeGeoIp($this->getAdapter()));

    return parent::init();
  }

}
