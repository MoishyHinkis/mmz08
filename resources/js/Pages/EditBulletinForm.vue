<template>
  <div>
    <layout>
      <Link href="/bulletin" class="w3-text-blue w3-margin-right w3-section"
        >canael changes and go back to past bulletins &rarr;</Link
      >
      <h4 class="w3-center">Edit {{ bulletin.name }}</h4>

      <div class="w3-cell-row">
        <div class="w3-cell w3-card m3 w3-mobile w3-margin-right w3-section bulletin">
          <bulletin :bulletin="bulletin"></bulletin>
        </div>
        <div class="w3-cell w3-card m3 w3-mobile w3-margin">
          <validation-errors></validation-errors>
          <form @submit.prevent="sendForm" class="w3-container w3-margin">
            <label for="name">name</label><br />
            <input
              type="text"
              name="name"
              v-model="form.name"
              class="w3-input"
            /><br /><br />
            <label for="date">date</label><br />
            <input
              type="text"
              name="fotter"
              v-model="form.date"
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
      </div>
    </layout>
  </div>
</template>

<script>
import Bulletin from "../Components/Bulletin.vue";
import Layout from "../Shared/Layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from "../Components/ValidationErrors.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  name: "EditBulletinForm",
  components: {
    Layout,
    Bulletin,
    ValidationErrors,
    Link,
  },
  props: {
    bulletin: Object,
  },
  setup(props) {
    const form = useForm(props.bulletin);

    function sendForm() {
      alert("your bulletin edited");
      form.post(`/bulletin/${props.bulletin.id}`);
      form.reset();
    }
    return { form, sendForm };
  },
};
</script>

<style scoped>
  .bulletin{
    width: 200px;
  }
</style>