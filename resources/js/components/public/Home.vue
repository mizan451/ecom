<template>
    <div>
        Home Page {{myName}}
    </div>
</template>

<script>
export default {
    name: "Home",
     data () {
        return {
            name: this.$store.state.user,
            myName : this.$store.getters['user/myName']
        }
    }
}
</script>

<style scoped>

</style>