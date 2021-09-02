<template>
  <div>
    <layout>
      <Link href="/pricelist" class="w3-text-blue w3-margin"
        >cancel changes and go back to price list &rarr;</Link
      >
      <h4 class="w3-center">Edit {{ ad.name }}</h4>
      <div class="w3-content">
        <div class="w3-col l3 m3 w3-text-white w3-hide-small">space</div>
        <div class="w3-col l3 m3 w3-mobile w3-card w3-margin">
          <ad :ad="ad"></ad>
        </div>
        <div class="w3-col l3 m3 w3-card w3-mobile w3-margin">
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
              v-model="form.footer"
              class="w3-input"
            /><br /><br />
            <input type="file" @input="filePath" class="w3-input" /><br /><br />
            <button class="w3-btn w3-green w3-margin" type="submit">
              Update Size
            </button>
          </form>
        </div>
        <div class="w3-col l3 m3 w3-text-white w3-hide-small">space</div>
      </div>
    </layout>
  </div>
</template>

<script>
import Ad from "../Components/Ad.vue";
import Layout from "../Shared/Layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from "../Components/ValidationErrors.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  name: "EditSizeForm",
  components: {
    Layout,
    Ad,
    ValidationErrors,
    Link,
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