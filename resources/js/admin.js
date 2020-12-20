require('./bootstrap');

window.Vue = require('vue');
import router from './admin/router'

Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default);

import {store} from './common/store/store'


import library from './common/library'

const admin = new Vue({
    el: '#admin',
    store,
    router,

    data:{
        test: 'testing for admin'
    }
});
