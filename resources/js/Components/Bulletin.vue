<template>
  <div>
    <div class="w3-container">
      <div class="w3-center">
        <h5>{{ bulletin.name }}</h5>
      </div>
      <div class="w3-border">
        <img :src="img.default" v-if="fileExists(bulletin.path)" />
        <div v-else>
          file dont exsits... <br />
          we working on this
        </div>
      </div>
      <div class="w3-center">
        <h5>
          {{ bulletin.date }}
        </h5>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Bulletin",
  props: {
    bulletin: Object,
  },
  data() {
    return {
      img: "",
    };
  },
  methods: {
    fileExists(path) {
      try {
        this.img = require(`../../../storage/app/public/bulletins/${path}`);
        return true;
      } catch (error) {
        console.log("error: ", error);
        return false;
      }
    },
  },
};
</script>
