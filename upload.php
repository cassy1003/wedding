<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<p><?php

if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], "files/" . $_FILES["image"]["name"])) {
    chmod("files/" . $_FILES["image"]["name"], 0644);
    echo $_FILES["image"]["name"] . "をアップロードしました。";
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}

?></p>
</body>
</html>
