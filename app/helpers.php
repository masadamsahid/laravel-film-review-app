<?php

if (! function_exists('is_user_id_exists')) {
  function is_user_id_exists($id, $arr)
  {
    $is_exists = false;
    foreach ($arr as $item) {
      if ($item->user_id === $id) {
        $is_exists = true;
        break;
      }
    }
    return $is_exists;
  }
}
