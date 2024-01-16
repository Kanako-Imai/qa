<?php
// $name = $_POST["name"];
// $mail = $_POST["mail"];

// //文字作成
// $str = date("Y-m-d H:i:s").",".$name.",".$mail;

var_dump($_POST);

// チェックボックスのラベルと値の対応を定義
$goodPointsLabels = [
    'point1' => '書類ドラフト作成、チェック',
    'point2' => 'TODO推奨',
    'point3' => 'ガイド機能',
];
// 選択されたチェックボックスの値を取得
$selectedGoodPoints = isset($_POST['goodPoints']) ? $_POST['goodPoints'] : [];

// 選択された各値をそのまま取得
$selectedGoodPointsLabels = $selectedGoodPoints;

// // 選択された各値に対応するラベルを取得
// $selectedGoodPointsLabels = [];
// if (is_array($selectedGoodPoints)) {
//     foreach ($selectedGoodPoints as $value) {
//         // チェックボックスの値が $goodPointsLabels に存在する場合のみ処理
//         if (array_key_exists($value, $goodPointsLabels)) {
//             $selectedGoodPointsLabels[] = $value;
//         }
//     }
// } else {
//     // $selectedGoodPoints が配列でない場合、空の配列を代入
//     $selectedGoodPointsLabels = [];
// }

$name = $_POST["name"];
$company = $_POST["company"]; 
$email = $_POST["email"];
$satisfaction = $_POST["satisfaction"];
$goodPointsText = implode(', ', $selectedGoodPointsLabels);
// $goodPoints = isset($_POST["goodPoints"]) ? $_POST["goodPoints"] : array(); // 配列のまま保存
// $goodPoints = isset($_POST["goodPoints"]) ? implode(", ", (array)$_POST["goodPoints"]) : ""; // 第2引数をarrayに変換
$additionalSupport = $_POST["additionalSupport"];
$reuse = $_POST["reuse"];
$comments = $_POST["comments"];

// 文字列の作成
// $str = date("Y-m-d H:i:s"). "," .$name. "," .$company. "," .$email. "," .$satisfaction. ",".implode(", ", (array)$goodPoints) ."," .$additionalSupport. "," .$reuse. "," .$comments;
$str = date("Y-m-d H:i:s") . "," . $name . "," . $company . "," . $email . "," . $satisfaction . "," . $goodPointsText . "," . $additionalSupport . "," . $reuse . "," . $comments;


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
        <li><a href="input.php">戻る</a></li>
    </ul>
</body>

</html>