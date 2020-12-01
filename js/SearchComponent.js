Vue.component('search-form', {
  props: ['searchLine'],
  template: `<form action="#" class="search-form" @submit.prevent="$parent.$emit('filter-goods')">
              <input type="text" class="search-field" v-model="searchLine">
              <button class="btn-search" type="submit">
                <img src="/img/search.png" alt="search">
              </button>
            </form>`
});