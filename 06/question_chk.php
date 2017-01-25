<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>旅行に関するアンケート</title>
</head>
<?php
    $kymd=htmlspecialchars($_POST["yesno"],ENT_QUOTES);
     $kymd=htmlspecialchars($_POST["kymd"],ENT_QUOTES);
     $kingaku=htmlspecialchars($_POST['place'],ENT_QUOTES);
     $syasyu=htmlspecialchars($_POST['problem'],ENT_QUOTES);
     $job=htmlspecialchars($_POST['job'],ENT_QUOTES);
    $job=htmlspecialchars($_POST['age'],ENT_QUOTES);
   ?>

    <body>
        アンケート内容
        <br>
        <br>最近旅行に行かれましたか？：
        <br>
        <?php   echo $yesno; ?>
            <br>
            <br>最近旅行に行かれましたか？ ：
            <br>
            <?php
      list($year,$month,$day)=explode('/',$kymd);
      if(checkdate($month,$day,$year)){
        echo $kymd;
      } else {
        echo $kymd . '  (日付が間違っています。)';
      }
 　?>
                <br>
                <br>旅行で訪れた場所：
                <br>
                <?php
    if (is_numeric($place)){
      echo $place . '';
    } else {
      echo $place . '  (数値を入力してください。)';
    }
 ?>
                    <br>
                    <br>旅行で困ったこと：
                    <br>
                    <?php
   echo $problem; ?>
                        <br>
                        <br>職業：
                        <br>
                        <?php   echo $job; ?>
                            <br>
                            <br>年齢：
                            <br>
                            <?php   echo $age; ?>
    </body>

</html>