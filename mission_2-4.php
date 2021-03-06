﻿<!--HTML5でマークアップするための「DOCTYPE宣言」-->
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
			//変数の宣言
			$filename = "mission_2-4_hayashi.txt";
			$number = 1;
			$name = "名前";
			$comment = "コメント";
			$delete = $_POST['delete'];
			$edit = $_POST['edit'];
			$time = date("Y/m/d/ H:i:s");
			$file_array = file($filename);
			$cnt = count($file_array);
			
			//編集選択機能
			for($i = 0 ; $i < $cnt ; $i++){
				$file_array_echo = explode("<>",$file_array[$i]);
				//投稿番号の整理（30~32行目は編集選択機能に直接関係ない）
				if($number <= $file_array_echo[0]){
					$number = $file_array_echo[0]+1;
				}
				if($edit != NULL){
					if($edit == $file_array_echo[0]){
						//実際に指定した番号の名前とコメントに差し替え
						$name= $file_array_echo[1];
						$comment = $file_array_echo[2];
					}
				}
			}
			?>
			
			<!--フォーム作成-->
				<form action = "mission_2-4.php" method = "POST">
				<!--フォームの中身-->
				<input type = "text" name = "name" value = "<?php echo $name; ?>"></br>
				<input type = "text" name = "comment" value = "<?php echo $comment; ?>"></br>
				<input type = "hidden" name = "flag" value = "<?php echo $_POST['edit']; ?>"></br>
				<input type = "text" name = "delete" value = "削除対象番号">
				<!--送信ボタンの作成-->
				<input type = "submit" value = "送信"></br>
				<!--フォームの中身-->
				<input type = "text" name = "edit" value = "編集対象番号">
				<!--送信ボタンの作成-->
				<input type = "submit" value = "編集"></br>
				<!--フォームの終了-->
				</form>
				
			<?php
			//phpの変数は前の＜？PHP？＞から変数は引き継がれる
			
			//txtファイルに書き込み
			$name = $_POST["name"];
			$comment = $_POST["comment"];
			$toukou = $number."<>".$name."<>".$comment."<>".$time;
			$fp = fopen($filename, 'a');
			//is_numeric（）半角数字が入っていいる場合tureを返す今回の場合！で性質を反転させている
			if(($comment != NULL) && !(is_numeric($_POST["flag"])) && !(is_numeric($delete)) && !(is_numeric($edit))){
			fwrite($fp, $toukou."\n");
			}
			fclose($fp);
			
			///削除機能
			if(is_numeric($delete)){
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
			
			//編集実行機能
			if(is_numeric($_POST['flag'])){
				//file_arrayはfp(ファイルを開く動作）の後に使えない
				$file_array = file($filename);
				$fp = fopen($filename,'w');
				for($i = 0 ; $i < $cnt ; $i++){
					$file_array_echo = explode("<>",$file_array[$i]);
					if($_POST['flag'] == $file_array_echo[0]){
						//実際に編集
						$file_array_echo[1] = $_POST['name'];
						$file_array_echo[2] = $_POST['comment'];
						//$file_array_echoを書き換えても$file_arrayは変わらないので新しい変数を用意
						$newdata = $file_array_echo[0]."<>".$file_array_echo[1]."<>".$file_array_echo[2]."<>".$file_array_echo[3];
						//上書き保存
						fwrite($fp,$newdata);
					}
					else{ 
				        fwrite($fp,$file_array[$i]);
					}
				}
				fclose($fp);
			}
			
			//最後に更新してる←これないからtxtファイルに書き込まれていなかった
			$file_array = file($filename);
			$cnt = count($file_array);
			
			//テキストファイルを読み込みブラウザに表示
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

