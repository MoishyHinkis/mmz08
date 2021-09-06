<template>
  <div>
    <layout>
      <div class="w3-center w3-margin">
        <Link href="/size" class="w3-text-blue"
          >cancel changes and go back to price list &rarr;</Link
        >
      </div>
      <h4 class="w3-center">Edit {{ size.name }}</h4>
      <div class="w3-cell-row">
        <div class="w3-cell w3-mobile w3-card w3-margin-right w3-section size">
          <size :size="size"></size>
        </div>
        <div class="w3-cell w3-card w3-mobile w3-margin-right w3-section">
          <validation-errors></validation-errors>
          <form @submit.prevent="sendForm" class="w3-container">
            <label for="name">name</label><br />
            <input
              type="text"
              name="name"
              v-model="form.name"
              class="w3-input"
            /><br /><br />
            <label for="price">price</label><br />
            <input
              type="number"
              name="price"
              v-model="form.price"
              class="w3-input"
            /><br /><br />
            <input type="file" @input="filePath" class="w3-input" required/><br /><br />
            <button class="w3-btn w3-green w3-margin" type="submit">
              Update Size
            </button>
          </form>
        </div>
      </div>
    </layout>
  </div>
</template>

<script>
import Size from "../Components/Size.vue";
import Layout from "../Shared/Layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from "../Components/ValidationErrors.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  name: "EditSizeForm",
  components: {
    Layout,
    Size,
    ValidationErrors,
    Link,
  },
  props: {
    size: Object,
  },
  setup(props) {
    const form = useForm({
      name: props.size.name,
      price: props.size.price,
      file: null,
    });

    function sendForm() {
      alert("your size edited");
      form.post(`/size/${props.size.id}`, {
        forceFormData: true,
        onSuccess: () => form.reset(),
      });
    }
    function filePath(e) {
      form.file = e.target.files[0];
    }
    return { form, sendForm, filePath };
  },
};
</script>
<style scoped>
.size {
  width: 200px;
}
</style>