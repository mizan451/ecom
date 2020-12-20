require('./bootstrap');

window.Vue = require('vue');

Vue.component('public-master', require('./components/public/PublicMaster.vue').default);

import router from './public/router'
import {store} from './common/store/store'
import library from './common/library'

const app = new Vue({
    el: '#app',
    store,
    router,
    data:{
        test:'testing for frontend'
    }
});
