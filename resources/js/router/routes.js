export default [
    { path: '/home', name: 'home', component: require('../pages/home.vue') },
    { path: '/profile', name: 'profile', component: require('../pages/auth/profile.vue') },
    { path: '/users', name: 'users.index', component: require('../pages/users/index.vue') },
    { path: '/users/create', name: 'users.create', component: require('../pages/users/create.vue') },
    { path: '/users/:userId', name: 'users.show', component: require('../pages/users/show.vue'), props: true },
    { path: '/users/:userId/edit', name: 'users.edit', component: require('../pages/users/edit.vue'), props: true },
    { path: '/modpacks', name: 'modpacks.index', component: require('../pages/modpacks/index.vue') },
    { path: '/modpacks/create', name: 'modpacks.create', component: require('../pages/modpacks/create.vue') },
    { path: '/modpacks/:modpackId', name: 'modpacks.show', component: require('../pages/modpacks/show.vue'), props: true },
    { path: '/modpacks/:modpackId/edit', name: 'modpacks.edit', component: require('../pages/modpacks/edit.vue'), props: true },
]
