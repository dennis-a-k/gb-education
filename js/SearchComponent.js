Vue.component('search', {
  data(){
    return{
      searchLine: ''
    }
  },
  template: `<form action="#" class="search-form" @submit.prevent="$parent.filterGoods(searchLine)">
              <input type="text" class="search-field" v-model="searchLine">
              <button class="btn-search" type="submit">
                <img src="/img/search.png" alt="search">
              </button>
            </form>`
});