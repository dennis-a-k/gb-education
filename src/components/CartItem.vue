<template>
  <div class="cart-item">
    <button class="minus-plus" @click="$emit('add-product', cartItem)">&#43;</button>
    <p>{{ cartItem.product_name }}</p>
    <img :src="cartItem.img" :alt="cartItem.product_name">
    <span id="product-quantity">{{ cartItem.quantity }} шт.</span>
    <p id="product-price">{{ cartItem.quantity * cartItem.price }} ₽</p>
    <button class="minus-plus"  @click="$emit('remove', cartItem)">&#8722;</button>
  </div>
</template>

<script>
export default {
  props: [ 'cartItem', 'img' ]
}
</script>