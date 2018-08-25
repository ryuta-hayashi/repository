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
				<form action = "mission_2-3.php" method = "POST"></br>
				<!--フォームの中身-->
				<input type = "text" name = "name" value = "名前"></br>
				<!--フォームの中身-->
				<input type = "text" name = "comment" value = "コメント"></br>
				<!--フォームの中身-->
				<input type = "text" name = "delete" value = "削除対象番号"></br>
				<!--送信ボタンの作成-->
				<input type = "submit" value = "送信">
				<!--フォームの終了-->
				</form>
			<?php
			$filename = "mission_2-1_hayashi.txt";
			$number = count(file($filename))+1;
			$name = $_POST['name'];
			$delete = $_POST['delete'];
			$comment = $_POST['comment'];
			$time = date("Y/m/d/ H:i:s");
			$toukou = $number."<>".$name."<>".$comment."<>".$time;
			$fp = fopen($filename, 'a');
			if(($comment != NULL) && ($delete == NULL)){
				fwrite($fp, $toukou."\n");
			}
			fclose($fp);
			
			$file_array = file($filename);
			$cnt = count($file_array);
			
			if(isset($delete)){
				//
				$fp = fopen($filename,'w');
				for($i = 0 ; $i < $cnt ; $i++){
					$file_array_echo = explode("<>",$file_array[$i]);
					if($delete != $file_array_echo[0]){
						//指定した行以外を書き込み
						fwrite($fp,$file_array[$i]);
					}
				}
				fclose($fp);
			}
			
			$file_array = file($filename);
			$cnt = count($file_array);
			
			for($i = 0 ; $i < $cnt ; $i++){
				for($j = 0 ; $j < 4 ; $j++){
					$file_array_echo = explode("<>",$file_array[$i]);
					echo $file_array_echo[$j]." ";
				}
				echo "<br>";
			}
		?>
		</body>
</html>

