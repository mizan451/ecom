<template>
  <div id="admin_master">
    <div class="wrapper">
      <template v-if="$route.name !== 'AdminLogin'">
         <admin-header ></admin-header>
          <admin-sidbr></admin-sidbr>

      </template>
         <router-view ></router-view>

      <!-- Control Sidebar  cut from here -->
      <admin-footer v-if="$route.name !== 'AdminLogin'"></admin-footer>
    </div>
    <!-- ./wrapper -->

  </div>
</template>

<script>
import AdminFooter from "./inc/AdminFooter";
import AdminHeader from "./inc/AdminHeader";
import AdminSidbr from "./inc/AdminSidbr";
export default {
  name: "AdminMaster",
  components: {
             AdminFooter,
             AdminHeader,
             AdminSidbr
      }
}
</script>
