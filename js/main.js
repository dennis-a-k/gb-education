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