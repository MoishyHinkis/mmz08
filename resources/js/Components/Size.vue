<template>
  <div>
    <div class="w3-container">
      <div class="w3-center">
        <h5>{{ size.name }}</h5>
      </div>
      <div class="w3-border">
        <img :src="size.path" v-if="fileExists(size.path)" />
        <div v-else>
          file dont exsits... <br />
          we working on this
        </div>
      </div>
      <div class="w3-center">
        <h5>
          {{ size.price }}
          <i class="fas fa-shekel-sign"></i>
        </h5>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Size",
  props: {
    size: Object,
  },
  methods: {
    fileExists(path) {
      try {
        require(`../../../storage/app/sizes/${path}`);
        return true;
      } catch (error) {
        console.log(error);
        return false;
      }
    },
  },
};
</script>
