class ProductsList{
    constructor(container = '.products'){
        this.container = container;
        this.goods = [];
        this._fetchProducts();
    }

    _fetchProducts(){
        this.goods = [
            {id: 1, title: 'Shirt', price: 150, img: 'img/Shirt.png'},
            {id: 2, title: 'Socks', price: 50, img: 'img/Socks.png'},
            {id: 3, title: 'Jacket', price: 350, img: 'img/Jacket.png'},
            {id: 4, title: 'Shoes', price: 250, img: 'img/Shoes.png'},
            {id: 5, title: 'Pants', price: 100, img: 'img/Pants.png'}
        ];
    }

    render(){
        const block = document.querySelector(this.container);
        this.goods.forEach(product => {
            const productObject = new ProductItem(product);
            block.insertAdjacentHTML('beforeend',productObject.render());
        });
    }

    //Метод, определяющий суммарную стоимость всех товаров
    totalPrice(){
        const totalPrice = document.querySelector('#total-price'); 
        let sum = 0;
        this.goods.forEach(product => sum += product.price);
        totalPrice.innerText = `Итого: ${sum} ₽`;
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
list.render();
list.totalPrice();

//Корзина---------------------------------------------------------------------------------------------------------

class Cart{
    constructor(){
        this.goods = [];
    }
    
    cost(){}

    render(){}
}

class CartItem{
    constructor(){}

    _plusCount(){}

    _minusCount(){}

    _dellCount(){}

    render(){}
}