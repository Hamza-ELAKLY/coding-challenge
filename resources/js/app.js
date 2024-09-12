import './bootstrap';
import Vue from 'vue';

Vue.component('product-list', require('./components/ProductList.vue').default);
Vue.component('product-create', require('./components/ProductCreate.vue').default);

const app = new Vue({
    el: '#app',
});
