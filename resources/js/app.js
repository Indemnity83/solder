import Vue from 'vue'
import store from './store'
import router from './router'

import './plugins'
import './components'
import './filters'

const app = new Vue({
    el: '#app',
    store,
    router,
});
