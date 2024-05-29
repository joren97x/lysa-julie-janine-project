import { createRouter, createWebHistory } from "vue-router"

import AuthLayout from '../components/Layouts/AuthLayout.vue'
import AdminLayout from '../components/Layouts/AdminLayout.vue'

const router = createRouter({
    history: createWebHistory(null),
    routes: [
        
        {
            path: '/login',
            component: () => import('../components/Login.vue'),
            name: 'Login',
            meta: {layout: AuthLayout}
        },
        {
            path: '/register',
            component: () => import('../components/Register.vue'),
            name: 'Register',
            meta: {layout: AuthLayout}
        },
        {
            path: '/admin/students',
            component: () => import('../components/Admin/Students.vue'),
            name: 'Students',
            meta: {layout: AdminLayout}
        },
        
    ]
})

export default router