import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    searchText : '',
    selectCategory: 0,
    parentSteps: [],
    current_page: 1,
    last_page: 1,
    total: 1,
    from: 0,
    to: 0,
    categories: []
  },
  mutations: {
    setSearchText (store, newValue) {
      store.searchText = newValue;
    },
    setSelectCategory (store, newValue) {
      store.selectCategory = parseInt(newValue);
    },
    setPaginationData (store, data) {
      store.parentSteps = data.data;
      store.current_page = data.current_page;
      store.last_page = data.last_page;
      store.total = data.total;
      store.from = data.from;
      store.to = data.to;
    },
    setCategories(store, data) {
      store.categories = data;
    }
  },
  actions: {
    getPaginationData({commit, state}, page) {
      axios.get('/api/steps?page=' + page + '&c_id=' + state.selectCategory + '&keyword=' + state.searchText).then(({data}) => {
          commit('setPaginationData', data.paginationData);
          commit('setCategories', data.categories);
      });
    },
    inputCategory({commit, dispatch}, newValue) {
      commit('setSelectCategory', newValue);
      dispatch('getPaginationData', 1);
    },
    inputSearchText({commit, dispatch}, newValue) {
      commit('setSearchText', newValue);
      dispatch('getPaginationData', 1);
    }
    // change(dispatch, store, page) {
    //   console.log('aaa');
    //   if (page >= 1 && page <= store.last_page) {
    //     dispatch('getPaginationData', page)
    //   } 
    // },
    // pages() {
    //     let start = _.max([this.current_page - 2, 1])
    //     let end = _.min([start + 5, this.last_page + 1])
    //     start = _.max([end - 5, 1])
    //     return _.range(start, end)
    // },
  }
})
export default store;