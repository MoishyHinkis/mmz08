<template>
  <div>
    <div class="w3-container">
        <div class="w3-center">
          <h5>{{ ad.name }}</h5>
        </div>
        <div class="w3-border">
          <img
            :src="require(`../../../storage/app/images/${ad.path}`).default"
            v-if="fileExists(ad.path)"
          />
          <div v-else>
            file dont exsits... <br />
            we working on this
          </div>
        </div>
        <div class="w3-center">
          <h5>
            {{ ad.footer }}
            <i :class="footerSign"></i>
          </h5>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Ad",
  props: {
    ad: Object,
    footerSign: String,
  },
  methods: {
    fileExists(path) {
      try {
        require(`../../../storage/app/images/${path}`);
        return true;
      } catch (error) {
        console.log(error);
        return false;
      }
    },
  },
};
</script>
