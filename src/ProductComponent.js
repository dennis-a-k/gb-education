const product = {
    props: ['product', 'img'],
    template:`<div class="product-item">
                <a href="#"><img :src="img" :alt="product.product_name"></a>
                <a href="#"><h3>{{ product.product_name }}</h3></a>
                <p>{{ product.price }} ₽</p>
                <button class="buy-btn btn" @click="$root.$refs.cart.addProduct(product)">
                    Купить
                </button>
            </div>`
};
const products = {
    data(){
        return {
            catalogUrl: `/catalogData.json`,
            products: [],
            filtered: [],
        }
    },
    components: {
        product
    },
    methods: {
        filter(value){
            let regexp = new RegExp(value, 'i');
            this.filtered = this.products.filter(el => regexp.test(el.product_name));
        }
    },
    mounted(){
        this.$parent.getJson(`/api/products`)
            .then(data => {
                for(let el of data){
                    this.products.push(el);
                    this.filtered.push(el);
                }
            });
    },
    template:`<div class="products">
                <p class="products__no" v-if="!products.length">Нет данных</p>
                <product 
                    v-for="product of filtered" 
                    :key="product.id_product"
                    :product="product"
                    :img="product.img"
                    >
                </product>
            </div>` 
};

export default products