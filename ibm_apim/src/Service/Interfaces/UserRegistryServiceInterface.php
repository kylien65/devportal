<?php
/********************************************************* {COPYRIGHT-TOP} ***
 * Licensed Materials - Property of IBM
 * 5725-L30, 5725-Z22
 *
 * (C) Copyright IBM Corporation 2018
 *
 * All Rights Reserved.
 * US Government Users Restricted Rights - Use, duplication or disclosure
 * restricted by GSA ADP Schedule Contract with IBM Corp.
 ********************************************************** {COPYRIGHT-END} **/

namespace Drupal\ibm_apim\Service\Interfaces;

use Drupal\Core\State\StateInterface;
use Psr\Log\LoggerInterface;
use Drupal\ibm_apim\ApicType\UserRegistry;

/**
 * Functionality for handling user registries
 */
interface UserRegistryServiceInterface {

  public function __construct(StateInterface $state, LoggerInterface $logger);

  /**
   * get all the user_registries
   *
   * @return NULL if an error occurs otherwise an array of the registries.
   */
  public function getAll();

  /**
   * get a specific user_registry by url
   *
   * @param $key
   * @return null|array
   */
  public function get($key);

  /**
   * Update all user_registries
   *
   * @param $data array of user_registries keyed on url
   */
  public function updateAll($data);

  /**
   * Update a specific user_registry
   *
   * @param $key
   * @param $data
   */
  public function update($key, $data);

  /**
   * Delete a specific user_registry
   *
   * @param $key (user_registries url)
   */
  public function delete($key);

  /**
   * Delete all current user registries
   */
  public function deleteAll();

  /**
   * @param $identityProviderName
   * @return null
   */
  public function getRegistryContainingIdentityProvider($identityProviderName);


  /**
   * The site has a default registry, this is stored in the site config.hange in the future.
   * @return UserRegistry
   *   The default user registry.
   * @throws \Exception if not default registry is found.
   *
   */
  public function getDefaultRegistry();

  /**
   * Set default registry for this site.
   * @param $url
   *
   * @return mixed
   */
  public function setDefaultRegistry($url);


}
