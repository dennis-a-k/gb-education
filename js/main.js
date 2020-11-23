class ProductsList{
    constructor(container = '.products'){
        this.container = container;
        this.goods = [];
        this._getProducts()
            .then(data => {
                this.goods = [...data];
                this.render();
            });
    }

    _getProducts(){
        return fetch(`/json/catalogData.json`)
            .then(result => result.json())
            .catch(error => {
                console.log(error);
            })
    }

    render(){
        const block = document.querySelector(this.container);
        this.goods.forEach(product => {
            const productObject = new ProductItem(product);
            block.insertAdjacentHTML('beforeend',productObject.render());
        });
    }
}

class ProductItem{
    constructor(product){
        this.id = product.id;
        this.title = product.title;
        this.price = product.price;
        this.img = product.img;
    }

    render(){
        return `<div class="product-item">
                    <a href="#"><img src="${this.img}" alt="${this.title}"></a>
                    <a href="#"><h3>${this.title}</h3></a>
                    <p>${this.price} ₽</p>
                    <button class="buy-btn">Купить</button>
                </div>`
    }
}

let list = new ProductsList();

//Корзина---------------------------------------------------------------------------------------------------------

class Cart{
    constructor(){
        this.goods = [];
        this.info = {};
        this._getCartProducts()
            .then(data => {
                this.goods = [...data.contents];
                this.info = {...data};
                this.render();
            });
    }

    _getCartProducts(){
        return fetch(`/json/getBasket.json`)
            .then(result => result.json())
            .catch(error => {
                console.log(error);
            })
    }

    cost(){}

    render(){
        document.querySelector('.cart-block').insertAdjacentHTML('beforeend',`<p>Сумма покупок: <span>${this.info.amount} ₽</span></p>`);
        document.querySelector('.cart-block').insertAdjacentHTML('beforeend',`<p>Количество товара: <span>${this.info.countGoods} шт.</span></p><hr>`);
        document.querySelector('.btn-cart').addEventListener('click', () => {
            document.querySelector('.cart-block').classList.toggle('invisible');
        });

        const block = document.querySelector('.cart-block');
        this.goods.forEach(product => {
            const productObject = new CartItem(product);
            block.insertAdjacentHTML('beforeend',productObject.render());
        });
    }
}

class CartItem{
    constructor(product){
        this.id = product.id;
        this.title = product.title;
        this.price = product.price;
        this.quantity = product.quantity;
    }

    _plusCount(){}

    _minusCount(){}

    render(){
        return `<div>
                    <button class="minus-plus" data-id="${this.id}">&#43;</button>
                    <p>${this.title}</p>
                    <span>${this.quantity} шт.</span>
                    <p>${this.quantity * this.price} ₽</p>
                    <button class="minus-plus" data-id="${this.id}">&#8722;</button>
                </div>`
    }
}

let cart = new Cart();