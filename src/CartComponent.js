const cartItem = {
    props: [ 'cartItem', 'img' ],
    template:`<div class="cart-item">
                <button class="minus-plus" @click="$emit('add-product', cartItem)">&#43;</button>
                <p>{{ cartItem.product_name }}</p>
                <img :src="cartItem.img" :alt="cartItem.product_name">
                <span id="product-quantity">{{ cartItem.quantity }} шт.</span>
                <p id="product-price">{{ cartItem.quantity * cartItem.price }} ₽</p>
                <button class="minus-plus"  @click="$emit('remove', cartItem)">&#8722;</button>
            </div>`
};
const cart = {
    data() {
        return {
            showCart: false,
            cartItems: [],
        }
    },
    components: {
        'cart-item': cartItem
    },
    methods: {
        addProduct( product ) {
            let find = this.cartItems.find( el => el.id_product === product.id_product );
            if ( find ) {
                this.$parent.putJson( `/api/cart/${ product.id_product }/${ product.product_name }`, { quantity: 1 } )
                    .then( data => {
                        if ( data.result ) {
                            find.quantity++;
                        }
                    } )
            } else {
                let prod = Object.assign( { quantity: 1 }, product );
                this.$parent.postJson( `api/cart/${ product.id_product }/${ product.product_name }`, prod )
                    .then( data => {
                        if ( data.result ) {
                            this.cartItems.push( prod );
                        }
                    } )
            }
        },
        remove( product ) {
            if ( product.quantity > 1 ) {
                this.$parent.putJson( `/api/cart/${ product.id_product }/${ product.product_name }`, { quantity: -1 } )
                    .then( data => {
                        if ( data.result ) {
                            product.quantity--;
                        }
                    } )
            } else {
                this.$parent.delJson( `/api/cart/${ product.id_product }/${ product.product_name }`, product )
                    .then( data => {
                        if ( data.result ) {
                            this.cartItems.splice( this.cartItems.indexOf( product ), 1 );
                        } else {
                            console.log( 'error' );
                        }
                    } )
            }
        },
    },
    mounted() {
        this.$parent.getJson( `/api/cart` )
            .then( data => {
                for ( let el of data ) {
                    this.cartItems.push( el )
                }
            } );
    },
    template:`<div>
                <button class="btn-cart btn" type="button" @click="showCart = !showCart" v-if="cartItems.length">
                    <div class="count">{{ this.cartItems.reduce((summ, item) => summ + item.quantity, 0) }}</div>
                    Корзина
                </button>
                <button class="btn-cart btn-no" type="button" @click="showCart = !showCart" v-else>
                    Корзина
                </button>
                <div class="cart-block" v-show="showCart">
                    <p class="products__no" v-if="!cartItems.length">Корзина пуста</p>
                    <p v-if="cartItems.length">
                        Сумма покупок: 
                    <span id="cost">{{ this.cartItems.reduce((summ, item) => summ + item.quantity*item.price, 0) }} ₽</span></p>
                    <hr v-if="cartItems.length">
                    <cart-item 
                        v-for="item of cartItems" 
                        :key="item.id_product"
                        :cart-item="item"
                        :img="item.imgCart"
                        @add-product="addProduct"
                        @remove="remove">
                    </cart-item>
                </div>
            </div>`
};
export default cart;