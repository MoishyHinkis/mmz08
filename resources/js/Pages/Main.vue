<template>
  <div>
    <layout>
      <div class="w3-container">
        <img
          :src="require(`../../images/reka.jpg`).default"
          v-if="fileExists('reka.jpg')"
        />
        <div v-else>
          file dont exsits... <br />
          we working on this
        </div>
      </div>
    </layout>
  </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";
export default {
  components: {
    Layout,
  },
  name: "Main",
  methods: {
    fileExists(path) {
      try {
        require(`../../images/${path}`);
        return true;
      } catch (error) {
        console.log(error);
        return false;
      }
    },
  },
};
</script>