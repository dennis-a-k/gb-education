<?php
include_once "views/header.php";
require_once "server/config.php";

$sql = "SET NAMES utf8";
$res = mysqli_query($connect, $sql);

$sql = "select * from goods";
$res = mysqli_query($connect, $sql);
?>
<div class="good-list _margin">
<?php
  while ($data = mysqli_fetch_assoc($res)) :
    if ($data['id'] == $_GET['id']) :
?>
    <img src="images/big/<?= $data['img_2']?>">
    <div class="">
      <h3 class="heading"><?= $data['title']?></h3>
      <p class="price"><?= $data['price']?> ₽</p>
      <p class="text-right description _margin-top"><?= $data['description']?></p>
			<a href="#" class="cart-button _margin-top" data-id="<?= $data['id']?>" >Купить</a>
		
			<script>
			function addToCard() {
    	//добавляем товар в корзину
    	let id = $(this).attr('data-id');


    	if (cart[id] == undefined) {
        cart[id] = 1; // если в корзине нет товара, то делаем его равным 1
    	} else {
        cart[id]++; // если такой товар есть - увеличиваем его количество на единицу
    	}

    	showMiniCart();
    	saveCart();
			}
			</script>
    </div>
	</div>
	<?php
    endif;
    endwhile;
?>

	

<?php require_once "views/footer.php";