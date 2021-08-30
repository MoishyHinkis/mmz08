<template>
  <div>
    <Layout>
      <div>
        <validation-errors></validation-errors>
        <form @submit.prevent="resetPassword">
          <label for="email">email</label><br />
          <input type="email" name="email" v-model="form.email" /><br /><br />
          <label for="password">password</label><br />
          <input
            type="password"
            name="password"
            v-model="form.password"
          /><br /><br />
          <label for="password_confirmation">password_confirmation</label><br />
          <input
            type="password"
            name="password_confirmation"
            v-model="form.password_confirmation"
          /><br /><br />
          <button type="submit">Reset Password</button>
        </form>
      </div>
    </Layout>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from "../../Shared/Layout.vue";
import ValidationErrors from "../../Components/ValidationErrors.vue";
export default {
  name: "ResetPassword",
  components: {
    Layout,
    ValidationErrors,
  },
  props: {
    email: String,
    token: String,
  },
  data() {
    return {
      form: useForm({
        token: this.token,
        email: this.email,
        password: null,
        password_confirmation: null,
      }),
    };
  },
  methods: {
    resetPassword() {
      this.form.post("/reset-password");
      this.form.reset();
    },
  },
};
</script>