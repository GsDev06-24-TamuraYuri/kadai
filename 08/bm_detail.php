<?php  

//GET送信されたidを取得(URLの後ろについてるデータ) 
$id = $_GET["id"];

  
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");

//SELECT * 中身全て
//FROM gs_user_table このテーブルから
//WHERE id=:id 指定したIDにマッチする

$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $res=$stmt->fetch();
//echo "<pre>";
//var_dump($res);
//echo "</pre>";

}


?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>user管理画面</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }
        </style>
    </head>

    <body>

        <!-- Head[Start] -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"><a class="navbar-brand" href="bm_select.php">データ一覧</a></div></div>
            </nav>
        </header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
<div class="jumbotron">
<fieldset>
<legend>user管理画面</legend>
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
<!--
<label>属性:
<input type="radio" value="<?=$res["kanri_flg"]?>"></label>
<label>利用状況:
<input type="radio" value="<?=$res["life_flg"]?>"></label>
-->

<br>
<br>
 <input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="送信">
</fieldset>
</div>   
</form>
<!-- Main[End] -->


</body>
</html>