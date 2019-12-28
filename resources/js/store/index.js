import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    searchText : '',
    selectCategory: 0,
  },
  mutations: {
    updateSearchText (store, newValue) {
      store.searchText = newValue;
    },
    updateSelectCategory (store, newValue) {
      store.selectCategory = parseInt(newValue);
    },
    showStepImg (store, path) {
      if(path === null) {
          return '/images/no-img.png'
      }
      return '/storage/img/' + path;
    }
  },
  actions: {

  }
})
export default store;