<?php

$list = '<ul>';
$dir = 'files/';
$handle = opendir($dir);
while(($file = readdir($handle)) !== false) {
  if( filetype($path = $dir . $file) == "file" ) {
    $list .= '<li><img src="' . $path . '"></li>';
  }
}
$list .= '</ul>';
?>

<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Takahiro & Akari Photos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="思い出の写真 (柏木隆宏 & 杉山明里)">
  <meta name="keywords" content="">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/photo.css">
  <meta property="fb:app_id" content="1531714836841223" />
  <meta property="og:title" content="Takahiro & Akari Photo" />
  <meta property="og:description" content="思い出の写真 (柏木隆宏 & 杉山明里)" />
  <meta property="og:url" content="http://wedding-party.club/photos" />
  <meta property="og:image" content="http://wedding-party.club/images/20170427_2338_IMG_1152.JPG" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div class="album">
    <?php echo $list; ?>
  </div>
</body>
</html>
