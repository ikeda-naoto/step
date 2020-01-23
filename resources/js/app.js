/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import store from './store';
import sanitizeHTML from 'sanitize-html';
import UUID from 'vue-uuid';



require('./bootstrap');
require('./asset/jquery');

window.Vue = require('vue');

import "@babel/polyfill";

Vue.prototype.$sanitize = sanitizeHTML;
Vue.use(UUID);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


Vue.component('prof-edit', require('./components/profEdit.vue').default);
Vue.component('regist-step', require('./components/registStep/registStep.vue').default);
Vue.component('step-list', require('./components/stepList/stepList.vue').default);
Vue.component('parent-step-detail', require('./components/parentStepDetail/parentStepDetail.vue').default);
Vue.component('my-page', require('./components/mypage/mypage.vue').default);
Vue.component('child-step-detail', require('./components/childStepDetail/childStepDetail.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// サニタイズ
Vue.filter('nl2br', function (text) {
    return text.replace(/\n/g, '<br/>');
})

const app = new Vue({
    el: '#app',
    store,
});
