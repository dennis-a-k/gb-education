class ProductsList{
    constructor(container = '.products', url = '/json/catalogData.json', item = ProductItem){
        this.container = container;
        this.url = url;
        this.item = item;
        this.goods = [];
        this.getProducts()
            .then(data => this.handleData(data));
    }

    getProducts(){
        return fetch(this.url)
            .then(result => result.json())
            .catch(error => {
                console.log(error);
            })
    }

    handleData(data){
        this.goods = [...data];
        this.render();
    }

    render(){
        const block = document.querySelector(this.container);
        this.goods.forEach(product => {
            const productObject = new this.item(product);
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
                    <button class="buy-btn btn" 
                        data-id="${this.id}"
                        data-title="${this.title}"
                        data-price="${this.price}"
                    >Купить</button>
                </div>`
    }
}

class Cart extends ProductsList{
    constructor(container = '.cart-block', url = '/json/getBasket.json', item = CartItem){
        super(container, url, item);
        this.info = {};
        this.getProducts()
            .then(data => {
                this.info = {...data};
                this._init();
                this.handleData(data.contents);
            });
    }

    // _cost(){}

    _init(){
        // document.querySelector('.cart-block').insertAdjacentHTML('beforeend',`<p>Сумма покупок: <span>${this.info.amount} ₽</span></p>`);
        // document.querySelector('.cart-block').insertAdjacentHTML('beforeend',`<p>Количество товара: <span>${this.info.countGoods} шт.</span></p><hr>`);
        document.querySelector('.btn-cart').addEventListener('click', () => {
            document.querySelector('.cart-block').classList.toggle('invisible');
        });
        document.querySelector('body').addEventListener('click', event => {
            if(event.target.classList.contains('buy-btn')){
                this._addProduct(event.target);
            }
        });
        document.querySelector(this.container).addEventListener('click', event => {
            if(event.target.classList.contains('dell-btn')){
                this._dellProduct(event.target);
            }
        });
    }

    _addProduct(element){
        console.log(element.dataset)
        let productId = +element.dataset['id'];
        let find = this.goods.find(product => product.id === productId);
        if(find.quantity >= 1){
            find.quantity++;
            this._updateCart(find);
        } else {
            let product = {
                id: productId,
                price: +element.dataset['price'],
                title: element.dataset['title'],
                quantity: 1
            };
            console.log(product)
            this.goods = [product];
            this.render();
        }
    }

    _dellProduct(element){
        let productId = +element.dataset['id'];
        let find = this.goods.find(product => product.id === productId);
        if(find.quantity > 1){
            find.quantity--;
            this._updateCart(find);
            console.log(find)
        } else {
            document.querySelector(`.cart-item[data-id="${productId}"]`).remove();
        }
    }

    _updateCart(product){
        let block = document.querySelector(`.cart-item[data-id="${product.id}"]`);
        block.querySelector('.product-quantity').textContent = `${product.quantity} шт.`;
        block.querySelector('.product-price').textContent = `${product.quantity*product.price} ₽`;
    }
}

class CartItem extends ProductItem{
    constructor(product){
        super(product);
        this.quantity = product.quantity;
    }

    render(){
        return `<div class="cart-item" data-id="${this.id}">
                    <button class="minus-plus buy-btn" data-id="${this.id}">&#43;</button>
                    <p>${this.title}</p>
                    <span class="product-quantity">${this.quantity} шт.</span>
                    <p class="product-price">${this.quantity * this.price} ₽</p>
                    <button class="minus-plus dell-btn" data-id="${this.id}">&#8722;</button>
                </div>`
    }
}

let list = new ProductsList();
let cart = new Cart();