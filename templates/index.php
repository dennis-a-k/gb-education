<?php include '../engine/main.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>eShop</title>
  <link rel="stylesheet" href="../public/styles/style.css">
</head>
<body>
  <header>
    <div class="cart">
      <a href="#" class="cart-button _margin" type="button">Корзина</a>
      <div class="cart-block"></div>
    </div>
  </header>
  <main>
    <div class="goods-list _margin">
			<?php
				while ($data = mysqli_fetch_assoc($res)):
			?>
			<div class="goods-item">
				<img src="../public/img/<?= $data['img']?>">
        <h3><?= $data['title']?></h3>
        <p><?= $data['price']?> ₽</p>
				<a href="good.php?id=<?= $data['id']?>" class="cart-button _margin-top">Купить</a>
			</div>
			<?php
				endwhile;
			?>
		</div>
		<form method="post" action="../engine/main.php" class="form-box">
    	<textarea class="_margin" name="text" rows="5" required placeholder="Оставить отзыв о товаре:"></textarea>
    	<div class="_margin">
				<p><input type="text" name="name" maxlength="30" required placeholder="Имя"></p>
        <input class="cart-button_width _margin-top" type="submit" name="submit">
			</div>
  	</form>
  	<?php
			while ($review = mysqli_fetch_assoc($res_rew)):
		?>
		<div class="goods-item _margin">
			<h3 class="text-right"><?= $review['name']?></h3>
			<p class="text-right"><?= $review['text']?></p>
			<h6 class="data _margin-top"><?= $review['data']?></h6>
		</div>
		<?php
			endwhile;
		?>
  </main>
</body>
</html>