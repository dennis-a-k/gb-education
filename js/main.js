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
        const BLOCK = document.querySelector(this.container);
        this.goods.forEach(product => {
            const productObject = new this.item(product);
            BLOCK.insertAdjacentHTML('beforeend',productObject.render());
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
        this.getProducts()
            .then(data => {
                this._init();
                this.handleData(data.contents);
                this._costAndCount();
            });
    }

    _costAndCount(){
        const SUM = document.querySelector(this.container);
        let cost = 0;
        let count = 0;
        this.goods.forEach(product => cost += (product.price * product.quantity));
        this.goods.forEach(product => count += product.quantity);
        SUM.insertAdjacentHTML('afterbegin',`<p>Количество товара: <span id="count">${count} шт.</span></p><hr>`);
        SUM.insertAdjacentHTML('afterbegin',`<p>Сумма покупок: <span id="cost">${cost} ₽</span></p>`);
    }

    _init(){
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
            this.goods = [product];
            this.render();
        }
    }

    _dellProduct(element){
        let productId = +element.dataset['id'];
        let find = this.goods.find(product => product.id === productId);
        if(find.quantity >= 1){
            find.quantity--;
            this._updateCart(find);
        } else {
            document.querySelector(`.cart-item[data-id="${productId}"]`).remove();
        }
    }

    _updateCart(product){
        const BLOCK = document.querySelector(`.cart-item[data-id="${product.id}"]`);
        BLOCK.querySelector('#product-quantity').textContent = `${product.quantity} шт.`;
        BLOCK.querySelector('#product-price').textContent = `${product.quantity*product.price} ₽`;
        const SUM = document.querySelector(this.container);
        let cost = 0;
        let count = 0;
        this.goods.forEach(product => cost += (product.price * product.quantity));
        this.goods.forEach(product => count += product.quantity);
        SUM.querySelector('#cost').textContent = `${cost} ₽`;
        SUM.querySelector('#count').textContent = `${count} шт.`;
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
                    <span id="product-quantity">${this.quantity} шт.</span>
                    <p id="product-price">${this.quantity * this.price} ₽</p>
                    <button class="minus-plus dell-btn" data-id="${this.id}">&#8722;</button>
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

let list = new ProductsList();
let cart = new Cart();
let contactForm = new ContactForm();