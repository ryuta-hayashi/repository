<!--HTML5でマークアップするための「DOCTYPE宣言」-->
<!DOCTYPE html>
<html lang = "ja">
	<!--その文書の作者情報、サーチエンジン向けのキーワードや説明、文書のタイトル利用するスタイルシート等
	その文書に関する情報を記述。-->
	<head>
	<!--ブラウザに対して「このページの文字コードはutf-8ですよ」と伝えるだけの記述で
	実際にファイルの文字コードを変更するわけではない。-->
	<meta charset = "UTF-8">
	<!--文書のタイトルを表す-->
	</head>
		<!--<body>～</body>の間には、実際にブラウザに表示される文書の本体を記述-->
		<body>
			<!--フォーム作成-->
				<form action = "mission_1-4.php" method = "POST">
				<!--フォームの中身-->
				<input type = "text" name = "comment" value = "コメント">
				<!--送信ボタンの作成-->
				<input type = "submit" value = "送信">
				<!--フォームの終了-->
			</form>
			<?php
				//入力フォームから送信された文字をPHPで変数$commentに格納
				$comment = $_POST['comment'];
				//ブラウザ画面の入力フォームの下に変数に入っている文字を表示
				//連結演算子「.」で文字列と変数を結合。
				//引数1つ：「現在の時刻」を「指定したフォーマット」で出力.戻り値はstring第一引数
				if($comment != NULL){
				echo "ご入力ありがとうございます。<br>" . date("Y年m月d日H時i分") . "に" . $_POST['comment'] . "を受け付けました。";
				}
			?>
		</body>
</html>