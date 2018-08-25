<?php	
	$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn,$user,$password);
	
	$id = 1;
	$nm = "ううう";
	$kome = "えええ"; //好きな名前、好きな言葉は自分で決めること
	$sql = "UPDATE tbtest SET name='$nm' , comment='$kome' where id = $id";
	$result = $pdo->query($sql);
?>
