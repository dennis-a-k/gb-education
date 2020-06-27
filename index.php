<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Pictures</title>
</head>
<body class="grid">
	<?php
		$files = scandir('img');
		for ($i=2; $i < count($files); $i++):		
	?>
	<a href="img.php?photo=<?= $files[$i]?>" target="_blank"><img src="img/<?= $files[$i]?>"></a>
	<?php
		endfor;
	?>
</body>
</html>