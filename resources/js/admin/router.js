import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)



import AdminDashboard from '../components/admin/AdminDashboard'
import AdminLogin from '../components/admin/auth/AdminLogin'

import CategoryList from '../components/admin/category/CategoryList'
import BrandList from '../components/admin/brand/BrandList'
import ProductList from '../components/admin/product/ProductList'
import CustomerList from '../components/admin/customer/CustomerList'
import OrderList from '../components/admin/order/OrderList'
import addOrUpdateProduct from '../components/admin/product/addOrUpdateProduct'

const router = new VueRouter({
    mode: 'history',
      routes:[
        { path:'/admin/dashboard', component: AdminDashboard , name: 'AdminDashboard'},
        { path:'/admin/login', component: AdminLogin , name: 'AdminLogin'},

        { path:'/admin/categories', component: CategoryList , name: 'CategoryList'},
        { path:'/admin/brands', component: BrandList , name: 'BrandList'},
        { path:'/admin/products', component: ProductList , name: 'ProductList'},
        { path:'/admin/customers', component: CustomerList , name: 'CustomerList'},
        { path:'/admin/orders', component: OrderList , name: 'OrderList'},
        { path:'/admin/add-new-product', component: addOrUpdateProduct , name: 'addOrUpdateProduct'},
        { path:'/admin/edit-product/:productId', component: addOrUpdateProduct , name: 'editProduct'},

      ]
  })


  router.beforeEach((to, from, next) => {
    let  isAuthenticated = '';
    let authUser = localStorage.getItem('adminLoggedIn') ? JSON.parse(localStorage.getItem('adminLoggedIn')) : false;
    if (authUser) {
     isAuthenticated = authUser.id && authUser.email ? true :  false;
    }else{
     isAuthenticated = false;
    }
 
     if (to.name !== 'AdminLogin' && !isAuthenticated) next({ name: 'AdminLogin' })
     else if(to.name === 'AdminLogin' && isAuthenticated) {
         next({name: 'AdminDashboard'})
     }
     else next()
   })
 
   export default router;
 