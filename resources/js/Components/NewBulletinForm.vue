<template>
  <div>
    <div class="w3-content">
      <div class="w3-col l4 m4 w3-text-white w3-hide-small">space</div>
      <div class="w3-col l4 m4 w3-card w3-mobile">
        <validation-errors></validation-errors>
        <form @submit.prevent="sendForm" class="w3-container">
          <h4 class="w3-center">Add New Bulletin</h4>
          <label for="name">name</label><br />
          <input
            type="text"
            name="name"
            v-model="form.name"
            class="w3-input"
          /><br /><br />
          <label for="footer">footer</label><br />
          <input
            type="text"
            name="footer"
            v-model="form.footer"
            class="w3-input"
          /><br /><br />
          <label for="link">link</label><br />
          <input
            type="url"
            name="link"
            v-model="form.link"
            class="w3-input"
          /><br /><br />
          <input type="file" @input="filePath" class="w3-input" /><br /><br />
          <button class="w3-btn w3-green w3-margin" type="submit">
            Add bulletin
          </button>
        </form>
      </div>
      <div class="w3-col l4 m4 w3-text-white w3-hide-small">space</div>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from "../Components/ValidationErrors.vue";
export default {
  name: "NewBulletinForm",
  components: {
    ValidationErrors,
  },
  setup() {
    const form = useForm({
      name: null,
      footer: null,
      link: null,
      file: null,
    });

    function sendForm() {
      alert("your Bulletin added");
      form.post("/pastbulletins");
      form.reset();
    }

    function filePath(e) {
      form.file = e.target.files[0];
    }
    return { form, sendForm, filePath };
  },
};
</script>