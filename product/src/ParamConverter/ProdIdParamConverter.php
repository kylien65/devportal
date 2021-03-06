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

namespace Drupal\product\ParamConverter;

use Drupal\Core\ParamConverter\ParamConverterInterface;
use Drupal\node\Entity\Node;
use Symfony\Component\Routing\Route;

class ProdIdParamConverter implements ParamConverterInterface {
  public function convert($value, $definition, $name, array $defaults) {
    if (!empty($value)) {
      $query = \Drupal::entityQuery('node');
      $query->condition('type', 'product');
      $query->condition('status', 1);
      $query->condition('product_id.value', $value);

      $nids = $query->execute();

      if (isset($nids) && !empty($nids)) {
        $nid = array_shift($nids);
        $node = Node::load($nid);
        return $node;
      }
      else {
        return NULL;
      }
    }
    else {
      return NULL;
    }
  }

  public function applies($definition, $name, Route $route) {
    return (!empty($definition['type']) && $definition['type'] == 'product.id');
  }
}