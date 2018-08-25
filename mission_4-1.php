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
			$name = "名前";
			$comment = "コメント";
			$pass = "パスワード";
		?>
		<!--フォーム作成-->
				<!--名前コメント-->
				<form action = "mission_4-1.php" method = "POST">
				<input type = "text" name = "name" value = "<?php echo $name; ?>"></br>
				<input type = "text" name = "comment" value = "<?php echo $comment; ?>"></br>
				<input type = "hidden" name = "flag" value = "<?php echo $_POST['edit']; ?>">
				<input type = "hidden" name = "editpass2" value = "<?php echo $_POST['editpass']; ?>">
				<input type = "text" name = "pass" value = "<?php echo $pass; ?>">
				<input type = "submit" value = "送信"></br></br>
				</form>
				<!--削除-->
				<form action = "mission_4-1.php" method = "POST">
				<input type = "text" name = "delete" value = "削除対象番号"></br>
				<input type = "text" name = "delpass" value = "パスワード">
				<input type = "submit" value = "削除"></br></br>
				</form>
				<!--編集-->
				<form action = "mission_4-1.php" method = "POST">
				<input type = "text" name = "edit" value = "編集対象番号"></br>
				<input type = "text" name = "editpass" value = "パスワード">
				<input type = "submit" value = "編集"></br>
				<!--フォームの終了-->
				</form>
				
			<?php
			$dsn = 'データベース名';
			$user = 'ユーザー名';
			$password = 'パスワード';
			$pdo = new PDO($dsn,$user,$password);
	
			$sql= "CREATE TABLE keijiban3(id INT,name char(32),comment TEXT,date DATETIME,pass char(16));";
			$stmt = $pdo->query($sql);
			
			//idの定義
			$sql = 'SELECT id FROM keijiban3';
			$result = $pdo->query($sql);
			$id = 1;
			foreach ($result as $row){
				if($id <= $row['id']){
				$id = $row['id']+1;
				}
			}
	
			//データを入力
			if(($_POST["comment"]) && !(is_numeric($_POST["flag"])) && !(is_numeric($_POST["delete"])) && !(is_numeric($_POST["edit"]))){
			$sql = $pdo -> prepare("INSERT INTO keijiban3 (id,name, comment,date,pass) VALUES (:id,:name, :comment,:date,:pass)");
			$sql -> bindParam(':id', $id, PDO::PARAM_INT);
			$sql -> bindParam(':name', $name, PDO::PARAM_STR);
			$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
			$sql -> bindParam(':date', $date, PDO::PARAM_STR);
			$sql -> bindParam(':pass', $pass, PDO::PARAM_STR);
			$name = $_POST["name"];
			$comment = $_POST["comment"]; 
			$date = date("Y/m/d/ H:i:s");
			$pass = $_POST["pass"];
			$sql -> execute();
			}
		
			//削除
			$sql = 'SELECT * FROM keijiban3';
			$results = $pdo -> query($sql);
			$id = $_POST["delete"];
			$pass = $_POST["delpass"];
			if(is_numeric($id)){
				foreach ($results as $row){
					if($id == $row['id'] && $pass == $row ['pass'] ){
						$sql = "delete from keijiban3 where id=$id";
						$result = $pdo->query($sql);
					}
				}
			}
			
			//編集
			$sql = 'SELECT * FROM keijiban3';
			$results = $pdo -> query($sql);
			$id = $_POST["flag"];
			$pass = $_POST["editpass2"];
			$nm = $_POST["name"];
			$kome = $_POST["comment"];
			if(is_numeric($_POST['flag'])){
				foreach ($results as $row){
					if($id == $row['id'] && $pass == $row ['pass'] ){
						$sql = "UPDATE keijiban3 SET name='$nm' , comment='$kome' where id = $id";
						$result = $pdo->query($sql);
					}
				}
			}

			//表示
			$sql = 'SELECT * FROM keijiban3';
			$results = $pdo -> query($sql);
			foreach ($results as $row){
			//$rowの中にはテーブルのカラム名が入る
				echo $row['id'].',';
				echo $row['name'].',';
				echo $row['comment'].',';
				echo $row['date'].'<br>';
			}
			?>
		</body>
</html>

