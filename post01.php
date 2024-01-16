<html>

<head>
    <meta charset="utf-8">
    <title>canaco満足度アンケート</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .cp_ipcheck {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .cp_ipcheck:before,
        .cp_ipcheck:after {
            -webkit-box-sizing: inherit;
            box-sizing: inherit;
        }

        .cp_ipcheck .box {
            width: 90%;
            margin: 2em auto;
            text-align: left;
            border: 1px solid white;
            border-radius: 3px;
            background: #ffffff;
        }

        .cp_ipcheck input[type=checkbox] {
            display: none;
        }

        .cp_ipcheck label:focus,
        .cp_ipcheck label:hover,
        .cp_ipcheck label:active,
        .cp_ipcheck input:checked+label {
            color: #da3c41;
        }

        .cp_ipcheck label:focus:before,
        .cp_ipcheck label:hover:before,
        .cp_ipcheck label:active:before,
        .cp_ipcheck input:checked+label:before {
            border-color: #da3c41;
            background: #ffffff;
        }

        .cp_ipcheck label {
            font-size: 1em;
            font-weight: bold;
            line-height: 1;
            position: relative;
            display: block;
            overflow: hidden;
            padding: 1em 1em 1em 3em;
            cursor: pointer;
            -webkit-transition: all 0.15s ease;
            transition: all 0.15s ease;
            white-space: nowrap;
            text-overflow: ellipsis;
            background: #ffffff;
        }

        .cp_ipcheck label:before {
            position: absolute;
            top: 1em;
            left: 1em;
            width: 10px;
            height: 10px;
            content: '';
            border: 0.2em solid #cccccc;
        }

        .cp_ipcheck input:checked+label:before {
            border-color: #da3c41;
            background: #da3c41;
        }

        .cp_ipradio {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .cp_ipradio:before,
        .cp_ipradio:after {
            -webkit-box-sizing: inherit;
            box-sizing: inherit;
        }

        .cp_ipradio .box {
            width: 90%;
            margin: 2em auto;
            text-align: left;
            border: 1px solid white;
            border-radius: 3px;
            background: #ffffff;
        }

        .cp_ipradio input[type=radio] {
            display: none;
        }

        .cp_ipradio label:focus,
        .cp_ipradio label:hover,
        .cp_ipradio label:active,
        .cp_ipradio input:checked+label {
            color: #da3c41;
        }

        .cp_ipradio label:focus:before,
        .cp_ipradio label:hover:before,
        .cp_ipradio label:active:before,
        .cp_ipradio input:checked+label:before {
            border-color: #da3c41;
            background: #ffffff;
        }

        .cp_ipradio label {
            font-size: 1em;
            font-weight: bold;
            line-height: 1;
            position: relative;
            display: block;
            overflow: hidden;
            padding: 1em 1em 1em 3em;
            cursor: pointer;
            -webkit-transition: all 0.15s ease;
            transition: all 0.15s ease;
            white-space: nowrap;
            text-overflow: ellipsis;
            background: #ffffff;
        }

        .cp_ipradio label:before {
            position: absolute;
            top: 1em;
            left: 1em;
            width: 10px;
            height: 10px;
            content: '';
            border: 0.2em solid #cccccc;
            border-radius: 50%;
        }

        .cp_ipradio input:checked+label:before {
            border-color: #da3c41;
            background: #da3c41;
        }

        .cp_ipradio input:disabled+label {
            cursor: not-allowed;
            color: rgba(0, 0, 0, 0.5);
            background: #efefef;
        }

        .cp_ipradio input:disabled+label:hover {
            border-color: rgba(0, 0, 0, 0.1);
        }

        .cp_ipradio input:disabled+label:before {
            border-color: #ffffff;
            background: #ffffff;
        }
    </style>
</head>

<body>

    <form action="write01.php" method="post">
        <h1>canaco満足度アンケート</h1>

        <label for="name">名前</label>
        <input type="text" id="name" name="name" required>

        <label for="company">会社名</label>
        <input type="text" id="company" name="company" required>

        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" required>

        <label for="satisfaction">今回の支援の満足度</label>
        <select id="satisfaction" name="satisfaction" required>
            <option value="high">満足</option>
            <option value="medium">普通</option>
            <option value="low">不満</option>
        </select>

        <label for="goodPoints">今回の支援でよかった点（複数選択可）</label>
        <div class="cp_ipcheck">
            <div class="box">
                <input type="checkbox" id="point1" name="goodPoints" value="draft">
                <label for="point1">書類ドラフト作成、チェック</label>
                <input type="checkbox" id="point2" name="goodPoints" value="TODO">
                <label for="point2">TODO推奨</label>
                <input type="checkbox" id="point3" name="goodPoints" value="guide">
                <label for="point3">ガイド機能</label>
            </div>
        </div>

        <label for="additionalSupport">他にどんな支援があったらうれしいか</label>
        <textarea id="additionalSupport" name="additionalSupport" rows="4"></textarea>

        <label for="reuse">また利用したいか</label>
        <div class="cp_ipradio">
            <div class="box">
                <input type="radio" id="reuseYes" name="reuse" value="yes">
                <label for="reuseYes">はい</label>
                <input type="radio" id="reuseNo" name="reuse" value="no">
                <label for="reuseNo">いいえ</label>
            </div>
        </div>

        <label for="comments">ご意見ご要望</label>
        <textarea id="comments" name="comments" rows="4"></textarea>


        <input type="submit" value="送信">
    </form>
    <ul>
        <li><a href="index.php">index.php</a></li>
    </ul>
</body>

</html>