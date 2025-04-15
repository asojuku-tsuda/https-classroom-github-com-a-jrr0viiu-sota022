<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body class="cyberpunk-bg">
    <div class="login-box">
      <h2>
<?php
if(mb_ereg('^[0-9]+$',$_GET['indata'])==false){
  die("数字を入力してください。");
}else{
echo "入力された数字は： " . $_GET['indata'];
}
?>
    </h2>
    </div>
  </body>
</html>
