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
    $goodPointsCount = ['draft' => 0, 'TODO' => 0, 'guide' => 0];
    $reuseCount = ['yes' => 0, 'no' => 0];




    // ファイルから行ごとにデータを読み込む
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        // 集計データを更新
        $satisfactionCount[$data[4]]++;
        $goodPointsCount[$data[5]]++;
        $reuseCount[$data[7]]++;

        echo '<tr>';
        foreach ($data as $index => $value) {
            echo '<td>';
            echo $value;
            echo '</td>';
        }
        echo '</tr>';
    }

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
                labels: ['draft', 'TODO', 'guide'],
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