<template>
  <div>
      <nav-bar></nav-bar>
    <div>
      <slot />
    </div>
  </div>
</template>

<script>
import NavBar from './NavBar.vue'
export default {
  name: "Layout",
  components:{
      NavBar
  },
};
</script>