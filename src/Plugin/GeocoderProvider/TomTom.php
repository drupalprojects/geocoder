<?php
/**
 * @file
 * The TomTom plugin.
 */

namespace Drupal\geocoder\Plugin\GeocoderProvider;

use Drupal\geocoder\GeocoderProvider\GeocoderProvider;
use Geocoder\Geocoder;
use Geocoder\Provider\Provider;

/**
 * Class TomTom.
 *
 * @GeocoderProviderPlugin(
 *  id = "TomTom",
 *  arguments = {
 *   "@geocoder.http_adapter",
 *   "@logger.channel.default",
 *   "@messenger"
 *  }
 * )
 */
class TomTom extends GeocoderProvider {
  /**
   * @inheritdoc
   */
  public function init() {
    $configuration = $this->getConfiguration();
    $this->setHandler(new \Geocoder\Provider\TomTom($this->getAdapter(), $configuration['apiKey']));

    return parent::init();
  }

}
