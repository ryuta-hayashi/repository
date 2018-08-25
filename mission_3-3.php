<?php	
	$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn,$user,$password);
	
	$sql= "CREATE TABLE tbtest"
	." ("
	. "id INT,"
	. "name char(32),"
	. "comment TEXT"
	.");";
	$stmt = $pdo->query($sql);
	
	$sql ='SHOW TABLES';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[0];
		echo '<br>'; 
	}
	echo "<hr>";
?>
