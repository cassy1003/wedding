<?php

if (is_uploaded_file($_FILES['image']['tmp_name'])) {
  $file = 'files/' . date('Ymd_Hi_') . $_FILES['image']['name'];
  if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
    chmod($file, 0644);
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=success');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=fail');
  }
} else {
  header('Location: ' . $_SERVER['HTTP_REFERER'] . '#upload_photo=not_found');
}
