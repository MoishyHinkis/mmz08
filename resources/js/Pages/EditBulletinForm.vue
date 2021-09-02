<template>
  <div>
    <layout>
      <Link href="/pastbulletins" class="w3-text-blue w3-margin"
        >canael changes and go back to past bulletins &rarr;</Link
      >
      <h4 class="w3-center">Edit {{ ad.name }}</h4>

      <div class="w3-content">
        <div class="w3-col l2 m2 w3-text-white m3 w3-hide-small">space</div>
        <div class="w3-col l4 m4 w3-card m3 w3-mobile w3-margin">
          <ad :ad="ad"></ad>
        </div>
        <div class="w3-col l4 m4 w3-card m3 w3-mobile w3-margin">
          <validation-errors></validation-errors>
          <form @submit.prevent="sendForm" class="w3-container w3-margin">
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
              name="fotter"
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
            <input
              type="file"
              @input="form.file = $event.target.files[0]"
              class="w3-input"
            /><br /><br />
            <button class="w3-btn w3-green w3-margin" type="submit">
              Update Bulletin
            </button>
          </form>
        </div>
        <div class="w3-col l2 m2 w3-text-white m3 w3-hide-small">space</div>
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
  name: "EditBulletinForm",
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
    const form = useForm(props.ad);

    function sendForm() {
      alert("your bulletin edited");
      form.put(`/pastbulletins/${props.ad.name}`);
      form.reset();
    }
    return { form, sendForm };
  },
};
</script>