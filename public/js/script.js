$(document).ready(function(){
  let inProgress = false; // идет процесс загрузки
  let startFrom = 5; // позиция с которой начинается вывод данных
   
  $('.show-more').click(function(){
    if (!inProgress){
      $.ajax({
        url: '../engine/ajax.php', // путь к ajax-обработчику
        method: 'POST',
        data: {
          'start' : startFrom
        },
        beforeSend: function(){
          inProgress = true;
        }
      }).done(function(data){
          data = jQuery.parseJSON(data); // данные в json
          if (data.length > 0){
            // добавляем записи в блок в виде html
            $.each(data, function(index, data){
              $('.goods-list').append('<div class="goods-item"><img src="img/'+data.img+'"><h3>'+data.title+'</h3><p>'+data.price+' ₽</p><a href="#" class="cart-button _margin-top">Купить</a></div>')
            })
            inProgress = false;
            startFrom += 5;
          }
        });
    }
  });
});