<template>
  <div>
    <Layout>
      <div>
        <validation-errors></validation-errors>
        <form @submit.prevent="resetLink">
          <label for="email">email</label><br />
          <input type="email" name="email" v-model="form.email" /><br /><br />
          <button type="submit">submit</button>
        </form>
      </div>
    </Layout>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import ValidationErrors from "../../Components/ValidationErrors.vue";
import Layout from "../../Shared/Layout.vue";
export default {
  name: "ForgotPassword",
  props: ["status"],
  components: {
    ValidationErrors,
    Layout,
  },
  data() {
    return {
      form: useForm({
        email: null,
      }),
    };
  },
  methods: {
    resetLink() {
      this.form.post("/forgot-password");
      this.form.reset();
    },
  },
};
</script>