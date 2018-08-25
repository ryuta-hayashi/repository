<?php
//1-2で保存したテキストフィアルを変数に格納
$filename = 'mission_1-2_Hayashi.txt';
//fopenでファイルを開く（'r'は読み込みモード）
$fp = fopen($filename, 'r');
//fgetsでファイルを読み込み変数に格納
$txt = fgets($fp);
//読み込んだ変数を出力
echo $txt;
//fcloseでファイルを閉じる
fclose($fp);
?>