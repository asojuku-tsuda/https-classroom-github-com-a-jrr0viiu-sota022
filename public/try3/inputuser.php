<?php
// ユーザー入力を取得（GET）
$username = $_GET['username'] ?? '';
$useraddress = $_GET['useraddress'] ?? '';
$usermail = $_GET['usermail'] ?? '';

// 日本語判定用 正規表現（ひらがな・カタカナ・漢字・長音符・々）
$jpRegex = '/^[\p{Hiragana}\p{Katakana}\p{Han}ー々]+$/u';
$emailRegex = '/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

$errors = [];

// 名前チェック
if (mb_strlen($username, 'UTF-8') > 20 || !preg_match($jpRegex, $username)) {
    $errors[] = "２０文字以内で名前を入力してください。記号等は利用できません。";
}

// 住所チェック
if (mb_strlen($useraddress, 'UTF-8') > 50 || !preg_match($jpRegex, $useraddress)) {
    $errors[] = "５０文字以内で入力してください。記号等は利用できません。";
}

// メールアドレスチェック
if (mb_strlen($usermail, 'UTF-8') > 100 || !preg_match($emailRegex, $usermail)) {
    $errors[] = "正しいメールアドレス形式で入力してください。記号は.-_@のみ利用可能。";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>入力確認</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="cyberpunk-bg">
    <div class="login-box">
      <h2>
<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "<br>";
    }
} else {
    echo "あなたが入力した値<br>";
    echo "名前：" . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . "<br>";
    echo "住所：" . htmlspecialchars($useraddress, ENT_QUOTES, 'UTF-8') . "<br>";
    echo "メールアドレス：" . htmlspecialchars($usermail, ENT_QUOTES, 'UTF-8');
}
?>
      </h2>
    </div>
  </body>
</html>
