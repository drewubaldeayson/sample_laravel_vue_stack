import {createRouter,createWebHistory} from 'vue-router'
import Home from '../pages/Home.vue'
import Details from '../pages/Details.vue'


const routes = [
    {
        path: '/',
        component: Home,
        name: 'login'
    },
    {
        path: '/details',
        component: Details,
        name:'details'
    },
    {
        path: '/home',
        component: Home,
        name:'home'
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router
