<template>
  <div id="public_master">
    <public-header></public-header>
    <public-bread-crum></public-bread-crum>
    <router-view></router-view>
    <public-footer></public-footer>
  </div>
</template>


<script>
import PublicHeader from "../public/inc/PublicHeader";
import PublicFooter from "../public/inc/PublicFooter";
import PublicBreadCrum from "../public/inc/PublicBreadCrum";
export default {
  name: "PublicMaster",
  components: {
    PublicHeader,
    PublicFooter,
    PublicBreadCrum
  }
};
</script>