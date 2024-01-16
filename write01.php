<?php

// var_dump($_POST);


$name = $_POST["name"];
$company = $_POST["company"]; 
$email = $_POST["email"];
$satisfaction = $_POST["satisfaction"];
$goodPoints = isset($_POST["goodPoints"]) ? $_POST["goodPoints"] : array(); // 配列のまま保存
$goodPoints = isset($_POST["goodPoints"]) ? implode(", ", (array)$_POST["goodPoints"]) : ""; // 第2引数をarrayに変換
$additionalSupport = $_POST["additionalSupport"];
$reuse = $_POST["reuse"];
$comments = $_POST["comments"];

$str = date("Y-m-d H:i:s") . "," . $name . "," . $company . "," . $email . "," . $satisfaction . "," . $goodPoints . "," . $additionalSupport . "," . $reuse . "," . $comments;

//File書き込み
$file = fopen("data/data.txt", "a");    // ファイル読み込み
fwrite($file, $str . "\n");
fclose($file);


?>




<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>

    <h1>書き込みしました。</h1>
    <h2>./data/data.txt を確認しましょう！</h2>

    <ul>
        <li><a href="post01.php">戻る</a></li>
    </ul>
</body>

</html>
