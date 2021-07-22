export default [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/roles', component: require('./components/Roles.vue').default },
    { path: '/levels', component: require('./components/Levels.vue').default },
    { path: '/permissions', component: require('./components/Permissions.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default }
];
