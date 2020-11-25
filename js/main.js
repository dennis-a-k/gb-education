const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

class List {
    constructor(url, container, list = list2){
        this.container = container;
        this.list = list;
        this.url = url;
        this.goods = [];
        this.allProducts = [];
        this._init();
    }
    getJson(url){
        return fetch(url ? url : `${API + this.url}`)
            .then(result => result.json())
            .catch(error => {
                console.log(error);
            })
    }
    handleData(data){
        this.goods = [...data];
        this.render();
    }
    calcSum(){
        return this.allProducts.reduce((accum, item) => accum += item.price, 0);
    }
    render(){
        const block = document.querySelector(this.container);
        for (let product of this.goods){
            const productObj = new this.list[this.constructor.name](product);
            this.allProducts.push(productObj);
            block.insertAdjacentHTML('beforeend', productObj.render());
        }
    }
    _init(){
        return false
    }
}

class Item{
    constructor(el, img = 'https://placehold.it/200x150'){
        this.product_name = el.product_name;
        this.price = el.price;
        this.id_product = el.id_product;
        this.img = img;
    }
    render(){
        return `<div class="product-item">
        <a href="#"><img src="${this.img}" alt="${this.product_name}"></a>
        <a href="#"><h3>${this.product_name}</h3></a>
        <p>${this.price} ₽</p>
        <button class="buy-btn btn" 
            data-id="${this.id_product}"
            data-name="${this.product_name}"
            data-price="${this.price}"
        >Купить</button>
    </div>`
    }
}

class ProductsList extends List{
    constructor(cart, container = '.products', url = "/catalogData.json"){
        super(url, container);
        this.cart = cart;
        this.getJson()
            .then(data => this.handleData(data));
    }
    _init(){
        document.querySelector(this.container).addEventListener('click', e => {
            if(e.target.classList.contains('buy-btn')){
                this.cart.addProduct(e.target);
            }
        });
        
    }
}

class ProductItem extends Item{}

class Cart extends List{
    constructor(container = ".cart-block", url = "/getBasket.json"){
        super(url, container);
        this.getJson()
            .then(data => {
                this.handleData(data.contents);
            });
    }
    addProduct(element){
        this.getJson(`${API}/addToBasket.json`)
            .then(data => {
                if(data.result === 1){
                    let productId = +element.dataset['id'];
                    let find = this.allProducts.find(product => product.id_product === productId);
                    if(find){
                        find.quantity++;
                        this._updateCart(find);
                    } else {
                        let product = {
                            id_product: productId,
                            price: +element.dataset['price'],
                            product_name: element.dataset['name'],
                            quantity: 1
                        };
                        this.goods = [product];
                        this.render();
                    }
                } else {
                    alert('Error');
                }
            })
    }
    removeProduct(element){
        this.getJson(`${API}/deleteFromBasket.json`)
            .then(data => {
                if(data.result === 1){
                    let productId = +element.dataset['id'];
                    let find = this.allProducts.find(product => product.id_product === productId);
                    if(find.quantity > 1){
                        find.quantity--;
                        this._updateCart(find);
                    } else {
                        this.allProducts.splice(this.allProducts.indexOf(find), 1);
                        document.querySelector(`.cart-item[data-id="${productId}"]`).remove();
                    }
                } else {
                    alert('Error');
                }
            })
    }
    _updateCart(product){
       let block = document.querySelector(`.cart-item[data-id="${product.id_product}"]`);
       block.querySelector('.product-quantity').textContent = `Количество: ${product.quantity}`;
       block.querySelector('.product-price').textContent = `${product.quantity*product.price} ₽`;
    }
    _init(){
        document.querySelector('.btn-cart').addEventListener('click', () => {
            document.querySelector(this.container).classList.toggle('invisible');
        });
        document.querySelector(this.container).addEventListener('click', e => {
           if(e.target.classList.contains('del-btn')){
               this.removeProduct(e.target);
           }
        })
    }

}

class CartItem extends Item{
    constructor(el, img = 'https://placehold.it/50x100'){
        super(el, img);
        this.quantity = el.quantity;
    }
    render(){
    return `<div class="cart-item" data-id="${this.id_product}">
            <div class="product-bio">
                <div class="product-desc">
                    <p class="product-title">${this.product_name}</p>
                    <p class="product-quantity">Количество: ${this.quantity}</p>
                    <p class="product-single-price"></p>
                    </div>
                </div>
                <div class="right-block">
                    <p class="product-price">${this.quantity*this.price} ₽</p>
                    <button class="del-btn" data-id="${this.id_product}">&times;</button>
                </div>
            </div>`
    }
}

class ContactForm {
    constructor(container = '.footer'){
        this.container = container; 
        this.userName = [];
        this.userPhone = [];
        this.userEmail = [];
        this.render();
        this._init();  
    }

    render(){
        return new Promise((res, req) => {
            const container = document.createElement('form');
            container.classList.add('form-box');
            container.innerHTML = `
                        <input class ="userName" type="text" placeholder="Имя/Name">
                        <input class ="userPhone " type="tel" placeholder="+7(000)000-0000">
                        <input class ="userEmail " type="email" placeholder="mymail@mail.ru">
                        <button type="submit" class ="btn submit">Отправить</button>
                        <p class ="form-text_error"></p>`
            document.querySelector('.footer').appendChild(container);
        })
    }

    validName(value) {
        let rex = /^[A-Za-zА-Яа-яЁё]+$/;
        this.userName = value.match(rex);
        console.log(this.userName);
    }
    validPhone(value) {
        let rex = /^\+\d{1}\(\d{3}\)\d{3}-\d{4}$/;
        this.userPhone = value.match(rex);
        console.log(this.userPhone);
    }
    validEmail(value) {
        let rex = /^[a-z0-9]+([.-])?[a-z0-9]+@([a-z0-9]+)\.([a-z]{2,6})$/;
        this.userEmail = value.match(rex);
        console.log(this.userEmail);
    }
    
    addError(){
        let error = 'Поля заполнены некорректно'
        if(this.userName === null){
            document.querySelector('.userName').classList.add('form_error');
            document.querySelector('.form-text_error').textContent = error;
        }else{
            document.querySelector('.userName').classList.remove('form_error');
            document.querySelector('.form-text_error').textContent = null;
        }
        if(this.userPhone === null){
            document.querySelector('.userPhone').classList.add('form_error');
            document.querySelector('.form-text_error').textContent = error;
        }else{
            document.querySelector('.userPhone').classList.remove('form_error');
            document.querySelector('.form-text_error').textContent = null;
        }if(this.userEmail === null){
            document.querySelector('.userEmail').classList.add('form_error');
            document.querySelector('.form-text_error').textContent = error;
        }else{
            document.querySelector('.userEmail').classList.remove('form_error');
            document.querySelector('.form-text_error').textContent = null;
        }
    }

    _init() {
        document.querySelector('.form-box').addEventListener('submit', event => {
            event.preventDefault();
            this.validName(document.querySelector('.userName').value);
            this.validPhone(document.querySelector('.userPhone').value);
            this.validEmail(document.querySelector('.userEmail').value);
            this.addError();
        });
    }
}

const list2 = {
    ProductsList: ProductItem,
    Cart: CartItem
};

let cart = new Cart();
let products = new ProductsList(cart);
let contactForm = new ContactForm();