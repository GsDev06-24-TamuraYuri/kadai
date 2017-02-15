<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>user管理画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="before_select.php">データ一覧</a></div>
      </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>新規登録</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ID：<input type="text" name="lid"></label><br>
     <label>PASSWORD：<input type="text" name="lpw"></label><br>
     属性：
     <input type="radio" name="kanri_flg" value="0">一般
<input type="radio" name="kanri_flg" value="1">管理者<br>
    利用状況
     <input type="radio" name="life_flg" value="0"> 利用中
<input type="radio" name="life_flg" value="1"> 利用していない
     <br>
     <br>
     <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
