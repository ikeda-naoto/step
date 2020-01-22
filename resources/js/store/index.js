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
  getters: {
    getParentSteps(state) { return state.parentSteps}
  },
  mutations: {
    // キーワード検索欄に入力された値を変数に代入
    setSearchText (store, newValue) {
      store.searchText = newValue;
    },
    // 選択されたカテゴリーのIDを変数に代入
    setSelectCategory (store, newValue) {
      store.selectCategory = parseInt(newValue);
    },
    // ページネーションに必要なデータを代入
    setPaginationData (store, data) {
      store.parentSteps = data.data;
      store.current_page = data.current_page;
      store.last_page = data.last_page;
      store.total = data.total;
      store.from = data.from;
      store.to = data.to;
    },
    // 全カテゴリーデータを変数に代入
    setCategories(store, data) {
      store.categories = data;
    }
  },
  actions: {
    // ページネーションに必要名データをサーバから取得する
    getPaginationData({commit, state}, page) {
      axios.get('/api/steps?page=' + page + '&c_id=' + state.selectCategory + '&keyword=' + state.searchText).then(({data}) => {
          // 受け取ったデータを変数に代入する
          commit('setPaginationData', data.paginationData);
          commit('setCategories', data.categories);
      });
    },
    // 選択カテゴリーを変数に代入し、新しいページネーションデータを取得する。
    inputCategory({commit, dispatch}, newValue) {
      commit('setSelectCategory', newValue);
      dispatch('getPaginationData', 1);
    },
    // 入力されたキーワードを変数に代入し、新しいページネーションデータを取得する。
    inputSearchText({commit, dispatch}, newValue) {
      commit('setSearchText', newValue);
      dispatch('getPaginationData', 1);
    }
  }
})
export default store;