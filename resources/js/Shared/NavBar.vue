<template>
  <div>
    <!-- regular bar for large screes -->
    <div class="w3-bar w3-orange w3-hide-small">
      <tabs class="w3-hide-small"></tabs>
    </div>
    <!-- sidebae for mobiles -->
    <button @click="show = !show" class="w3-orange w3-hide-medium w3-hide-large">
      <i class="fa fa-bars"></i>
    </button>
    <div
      class="w3-bar-block w3-orange w3-hide-medium w3-hide-large"
      v-show="show"
    >
      <tabs class="w3-hide-medium w3-hide-large"></tabs>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Tabs from "./Tabs.vue";
export default {
  name: "NavBa",
  components: {
    Link,
    Tabs,
  },
  data() {
    return {
      show: false,
    };
  },
};
</script>