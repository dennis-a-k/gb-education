$(document).ready(function(){
  let cart = {};
  loadCart();
  
  // $(function(){
  //   $.ajax({
  //     type: 'POST',
  //     url: '../controller/OrderController.class.php',
  //     data: {'cart': cart}
  //   });
  // });

  $('.buyme').click(function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    if (cart[id]==undefined){
      cart[id]=1;
    }else{
      cart[id]++;
    }

    console.log(cart);

    showCart();
    saveCart();
  });

  function saveCart(){
    localStorage.setItem('cart', JSON.stringify(cart));
  }

  function showCart(){
    let out = '';
    for (let id in cart){
      out += 'артикул '+ id +' --- количество: ' + cart[id] + '<br>';
    }
    $('.show-cart').html(out);
  }

  function loadCart(){
    if (localStorage.getItem('cart')){
      cart = JSON.parse(localStorage.getItem('cart'));
      showCart();
    }else{
      $('.show-cart').html('Корзина пуста!');  
    }
  }
});