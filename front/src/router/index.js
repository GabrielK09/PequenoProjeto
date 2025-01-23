import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/LoginView.vue'
import HomeView from '@/views/HomeView.vue'
import UpdateView from '@/views/forms/update/UpdateView.vue'

const routes = [
  {
    path: '/',
    name: 'Login',
    component: LoginView,
    
  },
  {
    path: '/home/:user_id',
    name: 'Home',
    component: HomeView,
    props: route => ({
      user_id: route.params.user_id,
      leader: route.params.leader
      
    }),
        
  },
  { 
    path: '/edit-card/:user_id/:card_id',
    name: "Update",
    component: UpdateView,
    props: true,

  }
  
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router 