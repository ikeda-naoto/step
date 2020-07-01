/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import 'es6-promise/auto';
import sanitizeHTML from 'sanitize-html';
import UUID from 'vue-uuid';

require('./bootstrap');
require('./asset/jquery');

// window.Vue = require('vue');
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


Vue.component('prof-edit-component', require('./components/profEditComponent.vue').default);
Vue.component('regist-step-component', require('./components/registStep/registStepComponent.vue').default);
Vue.component('step-list-component', require('./components/stepList/stepListComponent.vue').default);
Vue.component('parent-step-detail-component', require('./components/parentStepDetail/parentStepDetailComponent.vue').default);
Vue.component('child-step-detail-component', require('./components/childStepDetail/childStepDetailComponent.vue').default);
Vue.component('challenge-step-component', require('./components/mypage/challengeStepComponent.vue').default);
Vue.component('registed-step-component', require('./components/mypage/registedStepComponent.vue').default);
Vue.component('child-step-index-component', require('./components/childStepIndex/childStepIndexComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
