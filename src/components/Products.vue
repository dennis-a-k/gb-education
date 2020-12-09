<template>
  <div class="products">
    <p class="products__no" v-if="!products.length">Нет данных</p>
    <Product 
      v-for="product of filtered" 
      :key="product.id_product"
      :product="product"
      :img="product.img"
    />
  </div>
</template>

<script>
import Product from '@/components/ProductItem'

export default {
  data(){
    return {
      catalogUrl: `/catalogData.json`,
      products: [],
      filtered: [],
    }
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
  components: {
    Product
  }
}
</script>

<style>

</style>