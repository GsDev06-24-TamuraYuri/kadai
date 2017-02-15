<?php
//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= h($result["name"])."[".h($result["indate"])."]";
    $view .= '</a>　';
    $view .= '<a href="update.php?id='.$result["id"].'">';
    $view .= '[更新]';
    $view .= '</a>';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理画面</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="dateindex.php">ブックマーク登録</a>
      <a class="navbar-brand" href="before_select.php">ブックマーク一覧</a>
      <a class="navbar-brand" href="touroku.php">ユーザー登録</a>
      <a class="navbar-brand" href="select.php">ユーザー一覧</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<p class="title">データ一覧</p>
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>

<!-- Main[End] -->

</body>
</html>
