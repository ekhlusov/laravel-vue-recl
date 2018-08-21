require('./bootstrap');
window.Vue = require('vue');

/**
 * Imports
 */
import VueRouter from 'vue-router';
import CodesIndex from './components/codes/CodesIndex.vue';
import CodesCreate from './components/codes/CodesCreate.vue';
import CodesEdit from './components/codes/CodesEdit.vue';

/**
 * Create routes and router
 */
window.Vue.use(VueRouter);
const routes = [
        {
            path: '/',
            components: {
                codesIndex: CodesIndex
            }
        },
        {
            path: '/codes/create',
            component: CodesCreate,
            name: 'createCode'
        },
        {
            path: '/codes/edit/:id',
            component: CodesEdit,
            name: 'editCode'
        }
    ];

const router = new VueRouter({ routes });

/**
 * Run app
 */
const app = new Vue({ router }).$mount('#app');
