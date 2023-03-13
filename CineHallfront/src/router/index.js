import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
   
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/login',
      name: 'login',
    
      component: () => import('../views/logine.vue')
    },
    {
      path: '/register',
      name: 'register',

      component: () => import('../views/register.vue')
    },
    {
      path: '/Resravtion/:id',
      name: 'Resravtion',

      component: () => import('../views/Resravtion.vue')
    },
    {
      path: '/myResrvation/:idR',
      name: 'myResrvation',

      component: () => import('../views/myResrvation.vue')
    }

  ]
})

export default router
