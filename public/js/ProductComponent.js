Vue.component('products', {
  props: ['products'],
  template: `<div class="products">
              <p class="products__no" v-if="!products.length">Нет данных</p>
              <product v-for="item of products" 
                :key="item.id"
                :product="item">
              </product>
            </div>`
});
Vue.component('product', {
  props: ['product'],
  template: `<div class="product-item">
              <a href="#"><img :src="product.img" alt="{{ product.title }}"></a>
              <a href="#"><h3>{{ product.title }}</h3></a>
              <p>{{ product.price }} ₽</p>
              <button class="buy-btn btn" @click="$parent.$emit('add-product', product)">
                Купить
              </button>
            </div>`
});