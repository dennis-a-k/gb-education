<template>
  <form action="#" method="post" class="search-form" @submit.prevent="$parent.$refs.products.filter(userSearch)">
    <input type="text" class="search-field" v-model="userSearch">
    <button class="btn-search" type="submit">
      <img src="/img/search.png" alt="search">
    </button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      userSearch: ''
    }
   }
}
</script>