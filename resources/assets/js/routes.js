import VueRouter from 'vue-router';

let routes = [

    {
        path: '/login',
        component: require('./components/Login.vue')
    },

    {
        path: '/register',
        component: require('./components/Register.vue')
    },

    {
        path: '/nearby',
        component: require('./components/NearbyShops.vue')
    },

    {
        path: '/preferred',
        component: require('./components/PreferredShops.vue')
    },
];

export default new VueRouter({
    routes
});