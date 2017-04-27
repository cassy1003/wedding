<?php
$dir = "files/" ;

if( is_dir( $dir ) && $handle = opendir( $dir ) ) {
  echo "<ul>" ;
  while( ($file = readdir($handle)) !== false ) {
    if( filetype( $path = $dir . $file ) == "file" ) {
      // [li]タグ
      echo "<li><img src='" . $path . "' width='300px'></li>" ;
    }
  }
  echo "</ul>" ;
}
