<?php

namespace ServiceMap\Cloudinary;

use ServiceMap\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

/**
 * @method \Gitlab\Api\Groups $groups
 * @method \Gitlab\Api\Issues $issues
 * @method \Gitlab\Api\MergeRequests $merge_requests
 * @method \Gitlab\Api\MergeRequests $mr
 * @method \Gitlab\Api\Milestones $milestones
 * @method \Gitlab\Api\Milestones $ms
 * @method \Gitlab\Api\ProjectNamespaces $namespaces
 * @method \Gitlab\Api\ProjectNamespaces $ns
 * @method \Gitlab\Api\Projects $projects
 * @method \Gitlab\Api\Repositories $repositories
 * @method \Gitlab\Api\Repositories $repo
 * @method \Gitlab\Api\Snippets $snippets
 * @method \Gitlab\Api\SystemHooks $hooks
 * @method \Gitlab\Api\SystemHooks $system_hooks
 * @method \Gitlab\Api\Users $users
 */

class CloudinaryManager extends AbstractManager
{
  /**
   * The factory instance.
   *
   * @var \ServiceMap\Cloudinary\CloudinaryFactory
   */
  private $factory;

  /**
   * Create a new Cloudinary manager instance.
   *
   * @param \Illuminate\Contracts\Config\Repository $config
   * @param \ServiceMap\Cloudinary\CloudinaryFactory        $factory
   *
   * @return void
   */
  public function __construct(Repository $config, CloudinaryFactory $factory)
  {
    parent::__construct($config);
    $this->factory = $factory;
  }

  /**
   * Create the connection instance.
   *
   * @param array $config
   *
   * @return \Gitlab\Client
   */
  protected function createConnection(array $config)
  {
    return $this->factory->make($config);
  }

  /**
   * Get the configuration name.
   *
   * @return string
   */
  protected function getConfigName()
  {
    return 'cloudinary';
  }

  /**
   * Get the factory instance.
   *
   * @return \ServiceMap\Cloudinary\CloudinaryFactory
   */
  public function getFactory()
  {
    return $this->factory;
  }
}
