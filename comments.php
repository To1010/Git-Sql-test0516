<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメント一覧</title>
    <!-- CSS を外部ファイルとして読み込む -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>コメント一覧</h1>

    <?php
    // db_connect.php からの接続情報を含むファイルを読み込む
    require('db_connect.php');

    $currentDate = date("Y-m-d"); // 今日の日付を取得
    $sql = "SELECT name, subject, message, created_at FROM comments WHERE DATE(created_at) = '$currentDate' ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>宛先</th>
                    <th>送信元</th>
                    <th>時間</th>
                    <th>メッセージ</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["subject"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . date("H時i分", strtotime($row["created_at"])) . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "今日のコメントはありません";
    }

    $conn->close();
    ?>
</body>

</html>
