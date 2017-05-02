<?php

try {
  $valid = false;
  $images = $_FILES['images'];
  foreach($images['tmp_name'] as $index => $tmp) {
    $file = 'files/' . date('YmdHi_') . $index . '_'. $_FILES['images']['name'][$index];
    //if (!is_null($tmp) && is_uploaded_file($tmp) {
    $exif = exif_read_data($tmp, 0, true);
    switch ($exif['IFD0']['Orientation']) {
    case 3:
      $created = createImage($tmp, $images['type'][$index], 180, $file);
      break;
    case 6:
      $created = createImage($tmp, $images['type'][$index], 270, $file);
      break;
    case 8:
      $created = createImage($tmp, $images['type'][$index], 90, $file);
      break;
    }

    if ($created || move_uploaded_file($tmp, $file)) {
      file_put_contents('./_photos.txt', $file . " " . $_POST['email'] . "\n", FILE_APPEND);
      chmod($file, 0644);
      $valid = true;
    }
  }
  if ($valid) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=success');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=fail');
  }
} catch(Exception $e) {
  header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=fail');
}

function createImage($tmp, $type, $angle, $file) {
  switch ($type) {
  case 'image/png':
    $img = ImageCreateFromPNG($tmp);
    break;
  case 'image/jpg':
  case 'image/jpeg':
    $img = ImageCreateFromJPEG($tmp);
    break;
  }
  $created = false;
  if ($img) {
    $rotate = imagerotate($img, $angle, 0);
    $created = imagejpeg($rotate, $file);
    imagedestroy($img);
    imagedestroy($rotate);
  }
  return $created;
}
