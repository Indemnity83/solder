export default [
    { path: '/home', name: 'home', component: require('../pages/home.vue') },
    { path: '/users', name: 'users.index', component: require('../pages/users.vue') },
    { path: '/modpacks', name: 'modpacks.index', component: require('../pages/modpacks/index.vue') },
    { path: '/modpacks/:modpackId', name: 'modpacks.show', component: require('../pages/modpacks/show.vue'), props: true },
    { path: '/modpacks/:modpackId/edit', name: 'modpacks.edit', component: require('../pages/modpacks/edit.vue'), props: true },
    { path: '/groups', name: 'groups.index', component: require('../pages/groups/index.vue') },
    { path: '/groups/:groupId', name: 'groups.show', component: require('../pages/groups/show.vue'), props: true },
    { path: '/groups/:groupId/edit', name: 'groups.edit', component: require('../pages/groups/edit.vue'), props: true },
]
