<template>
  <div>
    <div class="w3-container">
      <div class="w3-center">
        <h5>{{ size.name }}</h5>
      </div>
      <div class="w3-border">
        <img :src="`/storage/sizes/${size.path}`" />
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
};
</script>
