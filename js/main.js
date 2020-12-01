const eShop = new Vue({
    el: '#e-shop',
    data: {
        catalogData: '/json/catalogData.json',
        products: [],
        filteredGoods: [],
        searchLine: '',
        showCart: false,
        cartItems: []
    },
    methods: {
        getProducts(url){
            return fetch(url)
                .then(result => result.json())
                .catch(error => {
                    console.log(error);
                })
        },
        addProduct(product){
            let find = this.cartItems.find(el => el.id === product.id);
            if(find){
                find.quantity++;
            } else {
                let prod = Object.assign({quantity: 1}, product);
                this.cartItems.push(prod)
            }
        },
        dellProduct(product){
            if(product.quantity>1){
                product.quantity--;
            } else {
                this.cartItems.splice(this.cartItems.indexOf(product), 1)
            }
        },
        addProductCart(product){
            product.quantity++;
        },
        filterGoods(){
            const regexp = new RegExp(this.searchLine, 'i');
            this.filteredGoods = this.products.filter(product => regexp.test(product.title));
        }
    },
    mounted(){
        this.getProducts(this.catalogData)
           .then(data => {
               for(let el of data){
                   this.products.push(el);
                   this.filteredGoods.push(el);
               }
           });
    }
});

// class ProductsList{
//     constructor(container = '.products', url = '/json/catalogData.json', item = ProductItem){
//         this.container = container;
//         this.url = url;
//         this.item = item;
//         this.goods = [];
//         this.getProducts()
//             .then(data => this.handleData(data));
//     }

//     getProducts(){
//         return fetch(this.url)
//             .then(result => result.json())
//             .catch(error => {
//                 console.log(error);
//             })
//     }

//     handleData(data){
//         this.goods = [...data];
//         this.render();
//     }

//     render(){
//         const block = document.querySelector(this.container);
//         this.goods.forEach(product => {
//             const productObject = new this.item(product);
//             block.insertAdjacentHTML('beforeend',productObject.render());
//         });
//     }
// }

// class ProductItem{
//     constructor(product){
//         this.id = product.id;
//         this.title = product.title;
//         this.price = product.price;
//         this.img = product.img;
//     }

//     render(){
//         return `<div class="product-item">
//                     <a href="#"><img src="${this.img}" alt="${this.title}"></a>
//                     <a href="#"><h3>${this.title}</h3></a>
//                     <p>${this.price} ₽</p>
//                     <button class="buy-btn btn" 
//                         data-id="${this.id}"
//                         data-title="${this.title}"
//                         data-price="${this.price}"
//                     >Купить</button>
//                 </div>`
//     }
// }

// class Cart extends ProductsList{
//     constructor(container = '.cart-block', url = '/json/getBasket.json', item = CartItem){//
//         super(container, url, item);
//         this.getProducts()
//             .then(data => {
//                 this._init();
//                 this.handleData(data.contents);
//                 //this._calcSum();
//             });
//     }

//     // _calcSum(){
//     //     const SUM = document.querySelector(this.container);
//     //     let cost = 0;
//     //     let count = 0;
//     //     this.goods.forEach(product => cost += (product.price * product.quantity));
//     //     this.goods.forEach(product => count += product.quantity);
//     //     SUM.insertAdjacentHTML('afterbegin',`<p>Количество товара: <span id="count">${count} шт.</span></p><hr>`);
//     //     SUM.insertAdjacentHTML('afterbegin',`<p>Сумма покупок: <span id="cost">${cost} ₽</span></p>`);
//     // }

//     _init(){
//         document.querySelector('.btn-cart').addEventListener('click', () => {
//             document.querySelector('.cart-block').classList.toggle('invisible');
//         });
//         document.querySelector(this.container).addEventListener('click', event => {  //'body'
//             if(event.target.classList.contains('buy-btn')){
//                 this._addProduct(event.target);
//             }
//         });
//         document.querySelector(this.container).addEventListener('click', event => {
//             if(event.target.classList.contains('dell-btn')){
//                 this._dellProduct(event.target);
//             }
//         });
//     }

//     _addProduct(element){
//         let productId = +element.dataset['id'];
//         let find = this.goods.find(product => product.id === productId);
//         if(find.quantity >= 1){
//             find.quantity++;
//             this._updateCart(find);
//         } else {
//             let product = {
//                 id: productId,
//                 price: +element.dataset['price'],
//                 title: element.dataset['title'],
//                 quantity: 1
//             };
//             this.goods = [product];
//             this.render();
//         }
//     }

//     _dellProduct(element){
//         let productId = +element.dataset['id'];
//         let find = this.goods.find(product => product.id === productId);
//         if(find.quantity > 1){
//             find.quantity--;
//             this._updateCart(find);
//         } else {
//             document.querySelector(`.cart-item[data-id="${productId}"]`).remove();
//         }
//     }

//     _updateCart(product){
//         const BLOCK = document.querySelector(`.cart-item[data-id="${product.id}"]`);
//         BLOCK.querySelector('#product-quantity').textContent = `${product.quantity} шт.`;
//         BLOCK.querySelector('#product-price').textContent = `${product.quantity*product.price} ₽`;
//         // const SUM = document.querySelector(this.container);
//         // let cost = 0;
//         // let count = 0;
//         // this.goods.forEach(product => cost += (product.price * product.quantity));
//         // this.goods.forEach(product => count += product.quantity);
//         // SUM.querySelector('#cost').textContent = `${cost} ₽`;
//         // SUM.querySelector('#count').textContent = `${count} шт.`;
//     }
// }

// class CartItem extends ProductItem{
//     constructor(product){
//         super(product);
//         this.quantity = product.quantity;
//     }

//     render(){
//         return `<div class="cart-item" data-id="${this.id}">
//                     <button class="minus-plus buy-btn" data-id="${this.id}">&#43;</button>
//                     <p>${this.title}</p>
//                     <span id="product-quantity">${this.quantity} шт.</span>
//                     <p id="product-price">${this.quantity * this.price} ₽</p>
//                     <button class="minus-plus dell-btn" data-id="${this.id}">&#8722;</button>
//                 </div>`
//     }
// }

// let list = new ProductsList();
// let cart = new Cart();