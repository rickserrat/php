<?php

$listReasons = [
            'Reason 1',
            'Reason 2',
            'Reason 3',
            'Reason 4',
        ];

/**
 * Randomize list with reasons.
 *
 * @param $list
 * @return array
 */
function randomReason($list) {
      if (!is_array($list)) {
          return $list;
      }
      $keys = array_keys($list);
      shuffle($keys);
      $random = array();

      foreach ($keys as $key) {
          $random[$list[$key]] = $list[$key];
      }

      $option = [''=> 'Select the reason'];

      return $option + $random;
  }

  $reasons = randomReason($listReasons);

  return $reasons
}
