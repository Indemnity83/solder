import Vue from 'vue'
import store from './store'
import router from './router'

import './plugins'
import './components'

const app = new Vue({
    el: '#app',
    store,
    router,
});
