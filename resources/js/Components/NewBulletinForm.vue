<template>
  <div>
    <div class="w3-center">
      <validation-errors></validation-errors>
      <form @submit.prevent="sendForm">
        <h4>Add New Bulletin</h4>
        <label for="name">name</label><br />
        <input type="text" name="name" v-model="form.name" /><br /><br />
        <label for="footer">footer</label><br />
        <input type="text" name="footer" v-model="form.footer" /><br /><br />
        <label for="link">link</label><br />
        <input type="url" name="link" v-model="form.link"/><br /><br />
        <input type="file" @input="filePath"/><br /><br />
        <button class="w3-btn" type="submit">Add bulletin</button>
      </form>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from '../Components/ValidationErrors.vue';
export default {
  name: "NewBulletinForm",
  components:{
    ValidationErrors
  },
  setup() {
    const form = useForm({
      name: null,
      footer: null,
      link: null,
      file: null
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