<?php
include("functions.php");
//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
$pdo = db_con();

//3.SELECT * FROM gs_user_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false){
  
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  $res = $stmt->fetch(); 
}
?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマークアプリ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

 <!-- Head[Start] -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <a class="navbar-brand" href="dateindex.php">ブックマーク登録</a>
      <a class="navbar-brand" href="before_select.php">ブックマーク一覧</a>
      <a class="navbar-brand" href="touroku.php">ユーザー登録</a>
      <a class="navbar-brand" href="select.php">ユーザー一覧</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
                    </div>
            </nav>
        </header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
<div class="jumbotron">
<fieldset>
<legend>データ詳細</legend>
<label>名前：
<input type="text" name="name" value="<?=$res["name"]?>">
</label>
<br>
<label>ID：
<input type="text" name="lid" value="<?=$res["lid"]?>">
</label>
<br>
<label>PASSWORD:
<input type="text" name="lpw" value="<?=$res["lpw"]?>">
</label>
<br>



<br>
<br>
 <input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="更新">
        
</fieldset>
</div>
</form>
<!-- Main[End] -->


</body>
</html>
