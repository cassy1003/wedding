<?php
  // ディレクトリのパスを記述
  $dir = "files/" ;

  // ディレクトリの存在を確認し、ハンドルを取得
  if( is_dir( $dir ) && $handle = opendir( $dir ) ) {
    // [ul]タグ
    echo "<ul>" ;

    // ループ処理
    while( ($file = readdir($handle)) !== false ) {
      // ファイルのみ取得
      if( filetype( $path = $dir . $file ) == "file" ) {
        /********************

          各ファイルへの処理

          $file ファイル名
          $path ファイルのパス

        ********************/

        // [li]タグ
        echo "<li><img src='" . $path . "'></li>" ;
      }
    }

    // [ul]タグ
    echo "</ul>" ;
  }
