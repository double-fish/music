import Vue from 'vue'
import VueRouter from 'vue-router'
const Home = ()=>import('../views/Home')
const Login = ()=>import('../views/Login')
const Date =()=>import('../views/Date')

Vue.use(VueRouter)

  const routes = [
  {
   path:'',
   redirect:'/home' 
  },
  {
   path:'/home',
   component:Home
  },
  {
   path:'/login',
   component:Login
  },
  {
   path:'/data/:user',
   component:Date
  },
]

const router = new VueRouter({
  mode: 'hash',
  base: process.env.BASE_URL,
  routes
})

export default router
