<template>
  <div>
    <layout>
      <img :src="require('../../images/reka.jpg').default" />
    </layout>
  </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";
export default {
  components: { Layout},
  name: "Main",
};
</script>