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
				<form action = "mission_2-2.php" method = "POST"></br>
				<!--フォームの中身-->
				<input type = "text" name = "name" value = "名前"></br>
				<!--フォームの中身-->
				<input type = "text" name = "comment" value = "コメント"></br>
				<!--送信ボタンの作成-->
				<input type = "submit" value = "送信">
				<!--フォームの終了-->
				</form>
			<?php
				$filename = "mission_2-1_hayashi.txt";
				//count(file( 'ファイル名' ))で指定した名前のファイルにあるデータの行数を数えて戻り値として受け取ることができ、その数値に１を足すと投稿番号が取得できる。
				$number = count(file($filename))+1;
				$name = $_POST['name'];
				$comment = $_POST['comment'];
				$time = date("Y/m/d/ H:i:s");
				$toukou = $number."<>".$name."<>".$comment."<>".$time;
				$fp = fopen($filename, 'a');
				fwrite($fp, $toukou."\n");
				fclose($fp);
			
			$file_array = file($filename);
			//countは配列の要素の数を数え、それを数値として返す関数
			$cnt = count($file_array);
			$delete = $POST['delete'];
			
			for($i = 0 ; $i < $cnt ; $i++){
				for($j = 0 ; $j < 4 ; $j++){
					//文字列を指定した文字列で分割する関数。分割された文字列は戻り値として返され、配列の各要素として格納される
					//配列を explode() によって渡された $file_array_echo は配列になる。(ex.$file_array_echo[0] = 投稿番号　$file_array_echo[1] = 名前　etc
					$file_array_echo = explode("<>",$file_array[$i]);
					//echoでは配列変数ではなく配列の要素の指定までいる。(Arrayの原因)
					echo $file_array_echo[$j]." ";
				}
				echo "<br>";
			}
		?>
		</body>
</html>