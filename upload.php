<?php
try {
  $valid = false;
  foreach($_FILES['images']['tmp_name'] as $index => $tmp) {
    //if (!is_null($tmp) && is_uploaded_file($tmp) {
    $file = 'files/' . date('YmdHi_') . $_POST['email'] . '_' . $_FILES['images']['name'][$index];
    if (move_uploaded_file($tmp, $file)) {
      chmod($file, 0644);
      $valid = true;
    }
    //}
  }
  if ($valid) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=success');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=fail');
  }
} catch(Exception $e) {
  header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=fail');
}
