<template>
  <div>
    <layout>
      <div class="w3-center">
          <ad :ad="ad" style="width:200px;height:auth"></ad>
          <validation-errors></validation-errors>
        <form @submit.prevent="sendForm">
          <h4>Edit {{ ad.name }}</h4>
          <label for="name">name</label><br />
          <input type="text" name="name" v-model="form.name" /><br /><br />
          <label for="footer">footer</label><br />
          <input type="text" name="fotter" v-model="form.footer" /><br /><br />
          <label for="link">link</label><br />
          <input type="url" name="link" v-model="form.link" /><br /><br />
          <input
            type="file"
            @input="form.file = $event.target.files[0]"
          /><br /><br />
          <button class="w3-btn" type="submit">Update Size</button>
        </form>
      </div>
    </layout>
  </div>
</template>

<script>
import Ad from '../Components/Ad.vue';
import Layout from "../Shared/Layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from '../Components/ValidationErrors.vue';
export default {
  name: "EditBulletinForm",
  components: {
    Layout,
    Ad,
    ValidationErrors
  },
  props: {
      ad: Object
  },
  setup(props) {
    const form = useForm(props.ad);

    function sendForm() {
      alert("your size edited");
      form.put(`/pastbulletins/${props.ad.name}`);
      form.reset();
    }
    return { form, sendForm };
  },
};
</script>