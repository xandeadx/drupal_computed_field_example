<?php

namespace Drupal\computed_field_example;

use Drupal\Core\Field\FieldItemList;
use Drupal\Core\TypedData\ComputedItemListTrait;
use Drupal\node\NodeInterface;

class ComputedNodeAgeFieldItemList extends FieldItemList {

  use ComputedItemListTrait;

  /**
   * {@inheritdoc}
   */
  protected function computeValue() {
    $node = $this->getEntity(); /** @var NodeInterface $node */
    $node_age = \Drupal::time()->getCurrentTime() - $node->getCreatedTime();
    $this->list[0] = $this->createItem(0, $node_age);
  }

}
