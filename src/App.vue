<template>
  <Navigation />
  <router-view/>
</template>
<script>
  import Navigation from "@/components/home/Navigation.vue";
  export default {
    components: { Navigation }
  }
</script>