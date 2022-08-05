import {createRouter,createWebHistory} from 'vue-router'
import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'
import Registration from '../pages/Registration.vue'


const routes = [
    {
        path: '/',
        component: Login,
        name: 'login'
    },
    {
        path: '/registration',
        component: Registration,
        name:'registration'
    },
    {
        path: '/login',
        component: Login,
        name:'login'
    },
    {
        path: '/home',
        component: Home,
        name:'home'
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router
