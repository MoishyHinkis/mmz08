<template>
  <div>
    <div v-if="hasErrors">
      <ul>
        <li v-for="(error, index) in errors" :key="index" class="w3-text-red">{{ error }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "ValidationErrors",
  computed: {
    errors() {
      return this.$page.props.errors;
    },
    hasErrors() {
      return Object.keys(this.errors).length > 0;
    },
  },
};
</script>