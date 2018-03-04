<?php

namespace Drupal\geocoder;

use GuzzleHttp\ClientInterface;
use Ivory\HttpAdapter\AbstractHttpAdapter;
use Ivory\HttpAdapter\Message\InternalRequestInterface;

/**
 * Extends AbstractHttpAdapter to provide Guzzle.
 */
class GeocoderHttpAdapter extends AbstractHttpAdapter {

  /**
   * The HTTP client to fetch the feed data with.
   *
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'geocoder_http_adapter';
  }

  /**
   * Creates an http adapter.
   *
   * @param \GuzzleHttp\ClientInterface $httpClient
   *   A Guzzle client object.
   */
  public function __construct(ClientInterface $httpClient) {
    parent::__construct();
    $this->httpClient = $httpClient;
  }

  /**
   * {@inheritdoc}
   */
  protected function sendInternalRequest(InternalRequestInterface $internalRequest) {
    $response = $this->httpClient->request($internalRequest->getMethod(), (string) $internalRequest->getUri(), [
      'headers' => $this->prepareHeaders($internalRequest, FALSE, FALSE),
    ]);
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  protected function sendInternalRequests(array $internalRequests, $success, $error) {
    foreach ($internalRequests as $internalRequest) {
      $response = $this->httpClient->request($internalRequest->getMethod(), (string) $internalRequest->getUri(), [
        'headers' => $this->prepareHeaders($internalRequest, FALSE, FALSE),
      ]);
      call_user_func($success, $response);
    }
  }

}
