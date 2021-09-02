<template>
  <div>
      <div class="w3-card w3-mobile center new-size">
        <validation-errors></validation-errors>
        <form @submit.prevent="sendForm" class="w3-container">
          <h4 class="w3-center">Add New Size</h4>
          <label for="name">name</label><br />
          <input
            type="text"
            name="name"
            v-model="form.name"
            class="w3-input"
          /><br /><br />
          <label for="price"
            >price in <i class="fas fa-shekel-sign"></i><br /> </label
          ><br />
          <input
            type="number"
            name="price"
            v-model="form.price"
            class="w3-input"
          />
          <input
            type="file"
            @input="filePath"
            required
            class="w3-input"
          /><br /><br />
          <button class="w3-btn w3-green w3-margin" type="submit">
            Add Size
          </button>
        </form>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from ".././Components/ValidationErrors.vue";
export default {
  name: "NewSizeForm",
  components: {
    ValidationErrors,
  },
  setup() {
    const form = useForm({
      name: null,
      price: null,
      file: null,
    });

    function sendForm() {
      alert("your size add");
      form.post("/pricelist");
      form.reset();
    }
    function filePath(e) {
      form.file = e.target.files[0];
    }
    return { form, sendForm, filePath };
  },
};
</script>
<style scoped>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.new-size {
  width: 25%;
}
</style>