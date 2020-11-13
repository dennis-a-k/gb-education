const products = [
    {id: 1, title: 'Shirt', price: 150},
    {id: 2, title: 'Socks', price: 50},
    {id: 3, title: 'Jacket', price: 350},
    {id: 4, title: 'Shoes', price: 250},
    {id: 5, title: 'Pants', price: 100},
];
//Функция для формирования верстки каждого товара
const renderProduct = (good) => {
    return `<div class="product-item">
                <h3>${good.title}</h3>
                <p>${good.price} ₽</p>
                <button class="buy-btn">Купить</button>
            </div>`
};
const renderPage = list => {
    const productsList = list.map(item => renderProduct(item)).join('');
    console.log(productsList);
    document.querySelector('.products').innerHTML = productsList;
};

renderPage(products);