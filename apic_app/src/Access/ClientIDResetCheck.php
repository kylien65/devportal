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

namespace Drupal\apic_app\Access;

use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Access\AccessResult;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Checks whether client ID reset is allowed.
 */
class ClientIDResetCheck implements AccessInterface {

  public function access() {
    ibm_apim_entry_trace(__CLASS__ . '::' . __FUNCTION__, NULL);
    $allowed = FALSE;
    $config = \Drupal::config('ibm_apim.settings');
    $allow_clientid_reset = $config->get('allow_clientid_reset');

    if ($allow_clientid_reset) {
      $allowed = TRUE;
    }

    ibm_apim_exit_trace(__CLASS__ . '::' . __FUNCTION__, $allowed);
    return AccessResult::allowedIf($allowed);
  }
}