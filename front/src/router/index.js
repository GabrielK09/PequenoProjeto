import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/LoginView.vue'
import HomeView from '@/views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginView
    
  },
  {
    path: '/home/:user_id',
    name: 'home',
    component: HomeView,
    props: true,

    
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router 