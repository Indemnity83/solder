import Vue from 'vue';

Vue.component('app', require('./app.vue'));
Vue.component('passport-clients', require('./passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./passport/PersonalAccessTokens.vue'));