<?php
	include '../config/config.php';
	$sql = 'SELECT * FROM goods order by id desc';
	$res = mysqli_query($connect,$sql);
	$sql_rew = 'SELECT * FROM reviews order by id desc';
	$res_rew = mysqli_query($connect,$sql_rew);

	function getGoods($connect, $id){
    $query = sprintf('SELECT * FROM goods where id=%d ',(int)$id);
		$result = mysqli_query($connect, $query);
    $good = mysqli_fetch_assoc($result);
    return $good;
	}

	if($_POST['submit']){
    $name = trim(strip_tags($_POST['name']));
    $text = trim(strip_tags($_POST['text']));

    $t = "INSERT INTO reviews (name, text) VALUES ('%s','%s')";

    $query = sprintf($t, mysqli_real_escape_string($connect, $name),mysqli_real_escape_string($connect, $text));

    $result = mysqli_query($connect, $query);

		header('Location: ../templates/index.php');
}
?>
