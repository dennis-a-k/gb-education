let cart = {};

function init() {
    // вычитываем файл goods.json
    $.getJSON("goods.json", goodsOut);

}

function goodsOut(data) {
    // вывод товаров на страницу

    console.log(data);
    let out = '';
    for (let key in data) {
        out += '<div class="goods-item">';
        out += '<a href="single.php?id=' + data[key].id + '"><img title=" " alt=" " src="images/small/' + data[key].img + '"></a>';
        out += '<a href="single.php?id=' + data[key].id + '"><h3>' + data[key].title + '</h3></a>';
        out += '<p>' + data[key].price + ' ₽</p>';
        out += '<button class="cart-button _margin-top" data-id="' + key + '">Купить</button>';
        out += '</div>';
    }
    $('.goods-list').html(out);
    $('button.cart-button').on('click', addToCard);
}

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

function saveCart() {
    // сохраняем корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}

// визуализация корзины
function showMiniCart() {
    let out = "";
    for (let key in cart) {
        out += key + '----' + cart[key] + '<br>';
    }
    $('.mini-cart').html(out);
}

function loadCart() {
    // проверяем есть ли в localStorage запись cart
    if (localStorage.getItem('cart')) {
        // если есть - расшифровываем и записываем в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
    }
}

$(document).ready(function () {
    init(); // запуск функции init() после загрузки страницы
    loadCart(); // сохранение данных в корзине при перезагрузке страницы
});



