<?php
	include '../config/config.php';
	$sql = 'select * from img_gallery';
	$res = mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../public/styles/style.css">
  <title>Pictures</title>
</head>
<body class="grid">
	<?php
		while ($data = mysqli_fetch_assoc($res)):
	?>
	<a href="img.php?img=<?= $data['path']?>" target="_blank"><img src="../public/img/<?= $data['path']?>"></a>
	<?php
		endwhile;
	?>
</body>
</html>