<template>
  <div>
    <div class="w3-center">
      <validation-errors></validation-errors>
      <form @submit.prevent="sendForm">
        <h4>Add New Size</h4>
        <label for="name">name</label><br />
        <input type="text" name="name" v-model="form.name" /><br /><br />
        <label for="price">price</label><br />
        <input type="number" name="price" v-model="form.price"/><br /><br />
        <input type="file" @input="filePath" required/><br /><br />
        <button class="w3-btn" type="submit">Add Size</button>
      </form>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from ".././Components/ValidationErrors.vue";
export default {
  name: "NewSizeForm",
  components:{
    ValidationErrors
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
      form.file = e.target.files[0]
    }
    return { form, sendForm, filePath};
  },
};
</script>