import Vue from 'vue'
import router from './router'

import './plugins'
import './components'

const app = new Vue({
    el: '#app',
    router,
});
