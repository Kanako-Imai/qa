<!-- //さくらサーバ（本番環境）にデプロイするときは削除する//
<?php
ini_set('display_errors', 'On'); // エラーを表示させるようにしてください
error_reporting(E_ALL); // 全てのレベルのエラーを表示してください
?> 

<?php
echo "<h1>hello</h1>";
echo "hello2";
?>

<h2>今年は<?php echo 2024?>年です</h2>
<h2>今年は<?= 2024?>年です</h2>

<?php
$name="今井";
var_dump($name);
$greet= $name."さんこんにちは";
var_dump($greet);
echo "<br>";
echo $greet;
?>
