<!-- // $file = fopen("data/data.txt","r"); // ファイル読み込み
// ファイル内容を1行ずつ読み込んで出力
// while ($str = fgets($file)) {
// echo nl2br($str); // nl2br() ... 改行文字を追加
// var_dump(explode(",", $str));
// }
// fclose($file);

// -->





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Display</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <?php
    $file = fopen("data/data.txt", "r");

    echo '<table>';
    echo '<tr><th>日付</th><th>名前</th><th>会社名</th><th>Email</th><th>満足度</th><th>良かった点</th><th>要望</th><th>また使いたいか</th><th>コメント</th></tr>';

    // 集計データの初期化
    $satisfactionCount = ['high' => 0, 'medium' => 0, 'low' => 0];
    $goodPointsCount = ['point1' => 0, 'point2' => 0, 'point3' => 0];
    $reuseCount = ['yes' => 0, 'no' => 0];

    $goodPointsLabels = [
        'point1' => '書類ドラフト作成、チェック',
        'point2' => 'TODO推奨',
        'point3' => 'ガイド機能',
    ];

    $selectedGoodPointsLabels = []; 

    while ($str = fgets($file)) {
        $data = explode(",", $str);

        var_dump($data);

        // 集計データ更新
        $satisfactionCount[$data[4]]++;
       
        foreach (explode(", ", $data[5]) as $selectedValue) {
            // 選択されたラベル名だけを取得
            if (array_key_exists($selectedValue, $goodPointsLabels)) {
                $selectedGoodPointsLabels[] = $goodPointsLabels[$selectedValue];
            }
        }
        $reuseCount[$data[7]]++;



        echo '<tr>';
        foreach ($data as $index => $value) {
            echo '<td>';
            // 列が Good Points の場合、checkbox の value ではなく label のテキストを表示
            if ($index === 5) {
                // var_dump($selectedGoodPointsLabels);
                echo implode("<br>", $selectedGoodPointsLabels);
            } else {
                echo $value;
            }
            echo '</td>';
        }
        echo '</tr>';
    }

    $selectedGoodPointsLabels = [];
 
    echo '</table>';

    fclose($file);
    ?>

    <!-- 集計データをJavaScriptに渡す -->
    <script>
        const satisfactionData = <?php echo json_encode($satisfactionCount); ?>;
        const goodPointsData = <?php echo json_encode($goodPointsCount); ?>;
        const reuseData = <?php echo json_encode($reuseCount); ?>;
    </script>

    <!-- Chart.jsを読み込む -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- 満足度の円グラフ -->
    <canvas id="satisfactionChart" width="10" height="10"></canvas>
    <script>
        var ctx = document.getElementById('satisfactionChart').getContext('2d');
        var satisfactionChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['High', 'Medium', 'Low'],
                datasets: [{
                    data: Object.values(satisfactionData),
                    backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384']
                }]
            },
            options: {
                title: {
                    display: true,
                    text: '満足度の分布'
                }
            }
        });
    </script>

    <!-- 良かった点の円グラフ -->
    <canvas id="goodPointsChart" width="10" height="10"></canvas>
    <script>
        var ctx2 = document.getElementById('goodPointsChart').getContext('2d');
        var goodPointsChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Point 1', 'Point 2', 'Point 3'],
                datasets: [{
                    data: Object.values(goodPointsData),
                    backgroundColor: ['#FFCE56', '#36A2EB', '#FF6384']
                }]
            },
            options: {
                title: {
                    display: true,
                    text: '良かった点の分布'
                }
            }
        });
    </script>

    <!-- また利用したいかの円グラフ -->
    <canvas id="reuseChart" width="10" height="10"></canvas>
    <script>
        var ctx3 = document.getElementById('reuseChart').getContext('2d');
        var reuseChart = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: ['Yes', 'No'],
                datasets: [{
                    data: Object.values(reuseData),
                    backgroundColor: ['#36A2EB', '#FFCE56']
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'また利用したいかの分布'
                }
            }
        });
    </script>


</body>

</html>