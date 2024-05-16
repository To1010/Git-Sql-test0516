<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Git・PHP・SQL・AJAXテスト課題</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#showComments").click(function() {
                $("#commentTable").toggle(); // 表示と非表示を切り替える
                if ($("#commentTable").is(":visible")) { // コメント一覧が表示されている場合
                    $.ajax({
                        url: 'comments.php', // URLまたはディレクトリを記載
                    })
                    .done(function(data) { // 通信が成功したときの処理 
                        $("#commentTable").html(data);
                        $("#showComments").text("コメントを非表示にする"); // ボタンのテキストを変更
                    })
                    .fail(function(data) { // 通信が失敗したときの処理
                        console.error('コメントの取得に失敗しました。');
                    })
                    .always(function(data) { //通信の成否にかかわらず実行する処理 
                        // 必要ならば何かしらの処理を記述
                    });
                } else {
                    $("#showComments").text("コメント一覧を表示する"); // ボタンのテキストを変更
                }
            });
        });
    </script>
    <style>
       
    </style>
</head>

<body>
    <h1>Git・SQL・PHP test<br>　　　　　からのAJAXテスト版</h1>

    <section class="profile">
        <h2>プロフィール</h2>
        <div class="profile-content">
            <div class="p-1">
                <h3>Hirayama</h3>
                <p>長崎県在住のナマケモノです<br>日向ぼっこしたい (・ω・)ノ</p>
            </div>
            <div class="p-2">
                <img src="./img/スクリーンショット 2024-03-06 171748.png" alt="Your Photo">
            </div>
        </div>
    </section>
    <section class="profile">
        <h2>プロフィール</h2>
        <div class="profile-content">
            <div class="p-1">
                <h3>Umeda</h3>
                <p>梅田綾夏です</p>
            </div>
            <div class="p-2">
                <img src="./img/umeda.png" alt="umeda Photo">
            </div>
        </div>
    </section>

    <section>
        <h2>お問い合わせフォーム</h2>
        <div class="form">
            <form action="process_form.php" method="post">
                <label for="subject">To: </label>
                <select id="subject" name="subject" required>
                    <option value="平山さんへ">平山さんへ</option>
                    <option value="梅田へ">梅田へ</option>
                </select><br>
                <label for="name">From: </label>
                <input type="text" id="name" name="name" placeholder="Name" required><br>
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" placeholder="xxx@xxxxx" required><br>
                <label for="message">Message:　　　　</label><br>
                <textarea id="message" name="message" rows="4" cols="50" placeholder="ひと言どうぞ" required></textarea><br>
                <input type="submit" value="送信">
            </form>
        </div>
    </section>

    <section>
    <div class="button-container">
        <h2>今日のコメント</h2>
        <button id="showComments">コメント一覧を表示する</button>
    </div>
    <div id="commentTable" style="display: none;"></div> <!-- 初期状態では非表示 -->
    </section>

    <div class="footer">
        <a href="prior_comments.php" class="button">昨日までのコメントを表示する</a>
    </div>
</body>

</html>
