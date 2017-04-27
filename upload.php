<?php

if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], "files/" . $_FILES["image"]["name"])) {
    chmod("files/" . $_FILES["image"]["name"], 0644);
    header("Location: " . $_SERVER['HTTP_REFERER'] . "#upload=success");
  } else {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "#upload=fail");
  }
} else {
  header("Location: " . $_SERVER['HTTP_REFERER'] . "#upload=not_found");
}
