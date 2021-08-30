<template>
  <div>
    <layout>
      <div class="w3-center">
        <ad :ad="ad" style="width: 200px; height: auth"></ad>
        <validation-errors></validation-errors>
        <form @submit.prevent="sendForm">
          <h4>Edit {{ ad.name }}</h4>
          <label for="name">name</label><br />
          <input type="text" name="name" v-model="form.name" /><br /><br />
          <label for="price">price</label><br />
          <input type="number" name="price" v-model="form.footer" /><br /><br />
          <input type="file" @input="filePath" /><br /><br />
          <button class="w3-btn" type="submit">Update Size</button>
        </form>
      </div>
    </layout>
  </div>
</template>

<script>
import Ad from "../Components/Ad.vue";
import Layout from "../Shared/Layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from '../Components/ValidationErrors.vue'
export default {
  name: "EditSizeForm",
  components: {
    Layout,
    Ad,
    ValidationErrors
  },
  props: {
    ad: Object,
  },
  setup(props) {
    const form = useForm({
      name: props.ad.name,
      footer: props.ad.footer,
      file: props.ad.file,
    });

    function sendForm() {
      alert("your size edited");
      form.put(`/pricelist/${props.ad.name}`);
      form.reset();
    }
    function filePath(e) {
      form.file = e.target.files[0];
    }
    return { form, sendForm, filePath };
  },
};
</script>