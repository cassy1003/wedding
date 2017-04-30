<?php
$list = '';
$dir = 'files/';
$handle = opendir($dir);
while(($file = readdir($handle)) !== false) {
  if (is_file($path = $dir . $file)) $files[] = $path;
}
rsort($files);
foreach ($files as $path) {
  $list .= '<div class="photo" style="background-image: url(' . $path . ')"></div>';
}
?>

<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Takahiro & Akari Photo Album</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="思い出の写真 (柏木隆宏 & 杉山明里)">
  <meta name="keywords" content="">
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/photo.css">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <meta property="fb:app_id" content="1531714836841223" />
  <meta property="og:title" content="Takahiro & Akari Photo Alubm" />
  <meta property="og:description" content="思い出の写真 (柏木隆宏 & 杉山明里)" />
  <meta property="og:url" content="http://wedding-party.club/photos" />
  <meta property="og:image" content="http://wedding-party.club/images/wedding_after_party_information.jpg" />
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-98286452-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>

<body>
  <div class="header">
    <h1>みなさんに送っていただいた写真</h1>
  </div>
  <div class="album">
    <?php echo $list; ?>
  </div>
  <p class="back"><a href="/">戻る</a></p>
</body>
</html>
