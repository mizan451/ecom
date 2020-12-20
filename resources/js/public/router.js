import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../components/public/Home'
import Shop from '../components/public/shop/Shop'
import About from '../components/public/shop/About'
import Cart from '../components/public/shop/Cart'
import ChekoutList from '../components/public/shop/ChekoutList'
import Contact from '../components/public/shop/Contact'
import WishList from '../components/public/shop/WishList'

//user component
import UserLogin from '../components/public/auth/UserLogin'
import UserRegister from '../components/public/auth/UserRegister'
import UserDashboard from '../components/public/user/UserDashboard'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes:[
        { path:'/', component: Home, name: 'Home'},
        { path:'/shop', component: Shop, name: 'Shop'},
        { path:'/about', component: About, name: 'About'},
        { path:'/cart', component: Cart, name: 'Cart'},
        { path:'/chekoutList', component: ChekoutList, name: 'ChekoutList'},
        { path:'/contact', component: Contact, name: 'Contact'},
        {
            path:'/wishlist', component: WishList, name: 'WishList',
            beforeEnter: (to, from, next) => {
                const isAuthenticated = localStorage.getItem('userLoggedIn') ? true : false;
                if (to.name !== 'UserLogin' && !isAuthenticated) next({ name: 'UserLogin' })
                else next()
              }
        },

        //User Component
        {
            path:'/user-login', component: UserLogin, name: 'UserLogin',
            beforeEnter: (to, from, next) => {
                const isAuthenticated = localStorage.getItem('userLoggedIn') ? true : false;
                if (to.name == 'UserLogin' && isAuthenticated) next({ name: 'UserDashboard' })
                else next();
              }
        },
        { path:'/user-register', component: UserRegister, name: 'UserRegister'},

        {
            path:'/user/user-dashboard', component: UserDashboard, name: 'UserDashboard',
            beforeEnter: (to, from, next) => {
                const isAuthenticated = localStorage.getItem('userLoggedIn') ? true : false;
                if (to.name !== 'UserLogin' && !isAuthenticated) next({ name: 'UserLogin' })
                else next()
              }
        },
    ]
  })

  export default router;
