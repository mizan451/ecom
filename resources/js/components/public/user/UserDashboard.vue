<template>
    <div>
        <h2>User Dashboard</h2>
          {{user}}
    </div>
</template>

<script>
export default {
    name: 'UserDashboard',
    computed : {
        user() {
          return this.$store.getters['user/getAuthUser']
        }
    },
    methods : {
        getUser() {
           this.$store.dispatch('user/getUser');
        }
    },
    created() {
        this.getUser();
    }
}
</script>

<style>

</style>
