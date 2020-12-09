<template>
  <div id="app">
    <header>
      <div class="container header">
        <a href="/" class="logo">
          e-Shop
          <span>
            Интернет магазин
          </span>
        </a>
        <Search />
        <Cart />
      </div>
    </header>
    <main class="container">
      <Products />
    </main>
    <footer>
      <div class="container">
        &copy; e-Shop
      </div> 
    </footer>
  </div>
</template>

<script>
import Search from '@/components/Search'
import Cart from '@/components/Cart'
import Products from '@/components/Products'

export default {
  name: 'App',
  components: {
    Search, Cart, Products
  },
  methods: {
    getJson(url){
      return fetch(url)
        .then(result => result.json())
        .catch(error => this.$refs.error.setText(error))
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
      .catch(error => this.$refs.error.setText(error))
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
      .catch(error => this.$refs.error.setText(error))
    },
    delJson(url, data){
      return fetch(url, {
        method: 'DELETE',
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      })
      .then(result => result.json())
      .catch(error => this.$refs.error.setText(error))
    },
  }
}
</script>

<style>

</style>