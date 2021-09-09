<template>
  <div>
    <div class="w3-container">
      <div class="w3-center">
        <h5>{{ bulletin.name }}</h5>
      </div>
      <div class="w3-border">
        <img :src="bulletin.path" v-if="fileExists(bulletin.path)" />
        <div v-else>
          file dont exsits... <br />
          we working on this
        </div>
      </div>
      <div class="w3-center">
        <h5>
          {{ bulletin.price }}
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
  methods: {
    fileExists(path) {},
  },
};
</script>
