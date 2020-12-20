<template>
     <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">{{admin.name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <router-link :to="{name: 'AdminDashboard'}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
           <li class="nav-item has-treeview menu-open">
            <router-link :to="{name: 'CategoryList'}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Categories
              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview menu-open">
            <router-link :to="{name: 'BrandList'}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Brands
              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview menu-open">
            <router-link :to="{name: 'ProductList'}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Products
              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview menu-open">
            <router-link :to="{name: 'CustomerList'}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Customers
              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview menu-open">
            <router-link :to="{name: 'OrderList'}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Orders
              </p>
            </router-link>
          </li>
         
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link " @click.prevent="logout()">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>
<script>
export default {
    name: "AdminSidbr",

    methods:{
      logout(){
        axios.get('/admin/logout')
        .then(res=>{
           localStorage.removeItem('adminLoggedIn')
           this.$router.push({ name: 'AdminLogin'})
        })
        .catch(err=>{

        })
      },
      getAuthUser(){
         this.$store.dispatch('admin/getUser');
      }
    },

    computed:{
      admin() {
        return this.$store.getters['admin/getAuthUser']
      }
    },

    created(){
      this.getAuthUser();
    }
}
</script>

<style scoped>

</style>