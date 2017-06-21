<?php

namespace ServiceMap\Cloudinary;

use Cloudinary;
use InvalidArgumentException;

class CloudinaryFactory
{
  /**
   * Make a new Cloudinary client.
   *
   * @param array $config
   *
   * @return \Cloudinary
   */
  public function make(array $config)
  {
    $config = $this->getConfig($config);

    return $this->getClient($config);
  }

  /**
   * Get the configuration data.
   *
   * @param string[] $config
   *
   * @throws \InvalidArgumentException
   *
   * @return array
   */
  protected function getConfig(array $config)
  {
    $keys = [
      'cloud_name',
      'api_key',
      'api_secret',
      'api_base_url',
      'base_url',
      'secure_url',
    ];

    foreach ($keys as $key) {
      if (!array_key_exists($key, $config)) {
        throw new InvalidArgumentException('Missing configuration key [' . $key . '].');
      }
    }

    return array_only($config, [
      'cloud_name',
      'api_key',
      'api_secret',
      'api_base_url',
      'base_url',
      'secure_url',
      'method',
      'sudo',
    ]);
  }

  /**
   * Get the main client.
   *
   * @param array $config
   *
   * @return \Cloudinary
   */
  protected function getClient(array $config)
  {
    $cloudinary = new Cloudinary;

    $uploader = new Cloudinary\Uploader;

    
  }
}
