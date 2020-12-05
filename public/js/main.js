const eShop = new Vue({
    el: '#e-shop',
    data: {
        products: [],
        filteredGoods: [],
        searchLine: '',
        showCart: false,
        cartItems: []
    },
    methods: {
        getJson(url){
            return fetch(url)
                .then(result => result.json())
                .catch(error => {
                    console.log(error);
                })
        },
        postJson(url, data){
            return fetch(url, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            })
                .then(result => result.json())
                .catch(error => {
                    this.$refs.error.text = error;
                })
        },
        putJson(url, data){
            return fetch(url, {
                method: 'PUT',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            })
                .then(result => result.json())
                .catch(error => {
                    this.$refs.error.text = error;
                })
        },
        addProduct(product){
            let find = this.cartItems.find(el => el.id === product.id);
            if(find){
                this.putJson(`/api/cart/${find.id}`, {quantity: 1})
                    .then(data => {
                        if(data.result === 1){
                            find.quantity++
                        }
                    });
            } else {
                let prod = Object.assign({quantity: 1}, product);
                this.postJson('/api/cart', prod)
                    .then(data => {
                        if(data.result === 1){
                            this.cartItems.push(prod)
                        }
                    });
                
            }
        },
        delProduct(product){
            if(product.quantity>1){
                product.quantity--
            } else {
                this.cartItems.splice(this.cartItems.indexOf(product), 1)
            }
        },
        filterGoods(){
            const regexp = new RegExp(this.searchLine, 'i');
            this.filteredGoods = this.products.filter(product => regexp.test(product.title));
        }
    },
    mounted(){
        this.getJson('/api/products')
           .then(data => {
               for(let el of data){
                   this.products.push(el);
                   this.filteredGoods.push(el);
               }
           }),
       this.getJson(`/api/cart`)
       .then(data => {
           for (let item of data){
               this.cartItems.push(item);
           }
       })
    }
});