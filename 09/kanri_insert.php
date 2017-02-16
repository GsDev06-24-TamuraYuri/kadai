<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
     !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["title"]) || $_POST["title"]=="" ||
     !isset($_POST["author"]) || $_POST["author"]=="" ||
    !isset($_POST["naiyou"]) || $_POST["naiyou"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$name      = $_POST["name"];
$email       = $_POST["email"];
$title       = $_POST["title"];
$author = $_POST["author"];
$naiyou  = $_POST["naiyou"];



//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, email, title, author, naiyou,indate )VALUES(NULL, :name, :email, :title, :author, :naiyou, sysdate())");
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':author', $author);
$stmt->bindValue(':naiyou', $naiyou);
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: dateindex.php");
  exit;
}
?>
