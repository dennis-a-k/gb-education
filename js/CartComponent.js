Vue.component('cart', {
  props: ['cartItems','visibility'],
  template: `<div class="cart-block" v-show="visibility">
              <p class="products__no" v-if="!cartItems.length">Корзина пуста</p>
              <cart-item v-for="item of cartItems" :key="item.id" :cart-item="item"></cart-item>
            </div>`
});
Vue.component('cart-item', {
  props: ['cartItem'],
  template: `<div class="cart-item">
              <button class="minus-plus" @click="$parent.$emit('add-product-cart', cartItem)">&#43;</button>
              <p>{{ cartItem.title }}</p>
              <span id="product-quantity">{{ cartItem.quantity }} шт.</span>
              <p id="product-price">{{ cartItem.quantity * cartItem.price }} ₽</p>
              <button class="minus-plus" @click="$parent.$emit('dell-product', cartItem)">&#8722;</button>
            </div>`
});