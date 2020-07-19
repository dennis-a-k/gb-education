<?php
require_once "server/config.php";

// $sql = "SET NAMES utf8";
// $res = mysqli_query($connect, $sql);

$sql = "select * from reviews order by id desc";
$res = mysqli_query($connect, $sql);
// $sql_rew = 'SELECT * FROM reviews order by id desc';
// $res_rew = mysqli_query($connection,$sql_rew);


?>

<form method="post" action="server/config.php" class="form-box">
    <textarea class="_margin" name="text" rows="5" required placeholder="Оставить отзыв о товаре:"></textarea>
    <div class="_margin">
	    <p><input type="text" name="name" maxlength="30" required placeholder="Имя"></p>
        <input class="cart-button_width _margin-top" type="submit" name="submit">
	</div>
</form>
<?php
	while ($review = mysqli_fetch_assoc($res)):
?>
<div class="goods-item _margin">
	<h3 class="text-right"><?= $review['name']?></h3>
	<p class="text-right"><?= $review['text']?></p>
	<h6 class="data _margin-top"><?= $review['data']?></h6>
</div>
<?php
	endwhile;
?>