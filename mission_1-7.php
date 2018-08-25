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
		<?php
			$filename = "mission_1-6_hayashi.txt";
			//file関数を使いテキストファイルの文字列を1行ごとに配列に格納
			$file_array = file($filename);
			//foreach($file_array as $value){処理}を使って配列の要素順に繰り返し処理。配列の要素は$valueに格納されている。
			foreach($file_array as $value){
				echo $value."<br>";
			}
		?>
		</body>
</html>