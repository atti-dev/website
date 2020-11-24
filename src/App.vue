<template>
  <Navigation />
  <router-view/>
  <Notifications />
</template>
<script>
  import Navigation from "@/components/home/Navigation.vue";
  import Notifications from "@/components/notify/Notifications.vue"
  export default {
    components: { Navigation, Notifications }
  }
</script>