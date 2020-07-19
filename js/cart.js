let cart = {};

// localStorage функция, которая вычитывает товары из корзины

function loadCart() {
    // проверяем есть ли в localStorage запись cart
    if (localStorage.getItem('cart')) {
        // если есть - расшифровываем и записываем в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        showCart();
    } else {
        $('.main_cart').html('Корзина пуста!');
    }
}

function showCart() {
    // вывод корзины
    if (!isEmpty(cart)) {
        $('.main_cart').html('Корзина пуста!');
    } else {
        $.getJSON('goods.json', function (data) {
            let goods = data;
            let out = '';
            let total = 0;
            let sum = 0;
            for (let id in cart) {
                sum = cart[id] * goods[id].price;
                out += '<li class="minicart-item">';
                out += '<div class="minicart-details-name">';
                out += '<a class="minicart-name" href="single.php?id=' + id + '">' + goods[id].title + '</a>';
                out += '<ul class="minicart-attributes">';
                out += '</ul></div>';
                out += '<div class="minicart-details-quantity">';
                out += '<button class="minus" data-id="' + id + '">-</button>';
                out += '<input class="minicart-quantity" data-minicart-idx="0" data-id="' + id + '" name="quantity_1" type="text" pattern="[0-9]*" value="' + cart[id] + '" autocomplete="off">';
                out += '<button class="plus" data-id="' + id + '">+</button>';
                out += '</div>';
                out += '<div class="minicart-details-remove">';
                out += '<button type="button" class="minicart-remove" data-id="' + id + '">×</button>';
                out += '</div>';
                out += '<div class="minicart-details-price">';
                out += '<span class="minicart-price">' + sum + ' ₽</span>';
                out += '</div></li>';
                total += sum;
            }
            out += '<hr><div class="minicart-subtotal"><p>Общая сумма: ' + total + ' ₽</p></div>';

            $('.main_cart ul').html(out);
            $('.minicart-remove').on('click', delGoods);
            $('.plus').on('click', plusGoods);
            $('.minus').on('click', minusGoods);
        });
    }
}

function showTotalSum() {
    $.getJSON('goods.json', function (data) {
        let goods = data;
        let sum = 0;
        for (let id in cart) {

        }
        $('minicart-subtotal').html(sum);
    });
}

function delGoods() {
    // удаляем товар из корзины
    let id = $(this).attr('data-id');
    delete cart[id];
    saveCart();
    showCart();
}

// добавляет товар в корзине
function plusGoods() {
    let id = $(this).attr('data-id');
    cart[id]++;
    saveCart();
    showCart();
}

function minusGoods() {
    let id = $(this).attr('data-id');
    if (cart[id] == 1) {
        delete cart[id];
    } else {
        cart[id]--;
    }
    
    saveCart();
    showCart();
}

function saveCart() {
    // сохраняем корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}

// если корзина равна пустому объекту, то выводится запись корзина пуста
// проверка на пустой объект
function isEmpty(object) {
    for (let key in object) {
        if (object.hasOwnProperty(key)) {
            return true;
        }
        return false;
    }
}

function sendEmail() {
    let ename = $('#ename').val();
    let email = $('#email').val();
    let ephone = $('#ephone').val();
    if (ename != '' && email != '' && ephone != '') {
        if (isEmpty(cart)) {
            $.post(
                "core/mail.php",
                {
                    "ename" : ename,
                    "email" : email,
                    "ephone" : ephone,
                    "cart" : cart
                },
                function (data) {
                    if (data == 1) {
                        alert('Заказ отправлен');
                    } else {
                        alert('Повторите заказ');
                    }
                }
            );
        } else {
            alert('Корзина пуста');
        }
    } else {
        alert('Заполните поля');
    }
}

$(document).ready(function () {
    loadCart();
    $('.send-email').on('click', sendEmail);
});



