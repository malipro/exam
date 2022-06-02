require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import productsIndex from './components/products/productsIndex.vue';

const routes = [
    {
        path: '/',
        components: {
            productsIndex: productsIndex
        }
    },

]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
