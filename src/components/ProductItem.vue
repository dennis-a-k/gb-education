<template>
  <div class="product-item">
    <a href="#"><img :src="img" :alt="product.product_name"></a>
    <a href="#"><h3>{{ product.product_name }}</h3></a>
    <p>{{ product.price }} ₽</p>
    <button class="buy-btn btn" @click="$root.$refs.cart.addProduct(product)">
      Купить
    </button>
  </div>
</template>

<script>
export default {
  props: ['product', 'img']
}
</script>

<style>

</style>