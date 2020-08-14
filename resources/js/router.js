import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import dashboard from './admin/Dashboard';
import restaurants from './admin/Restaurants';
import menus from './user/RestaurantMenus';
// import dashboard from './components/Dashboard';

let routes = [{
        path: '/admin/dashboard',
        component: dashboard,
        name: 'dashboard'
    },
    {
        path: '/admin/restaurants',
        component: restaurants,
        name: 'restaurants'
    },
    {
        path: '/user/menus',
        component: menus,
        name: 'menus'
    },
]


export default new Router({
    mode: 'history',
    routes
})
