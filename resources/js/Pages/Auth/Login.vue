<template>
  <div>
    <div>
      <Layout>
        <div class="w3-card-4">
          <form @submit.prevent="sendForm" class="w3-container w3-margin">
            <validation-errors></validation-errors>
            <fieldset>
              <legend>Log in</legend>
              <label for="email">email</label><br />
              <input
                type="email"
                name="email"
                v-model="form.email"
                class="w3-input"
              /><br /><br />
              <label for="password">password</label><br />
              <input
                type="password"
                name="password"
                v-model="form.password"
                class="w3-input"
              /><br /><br />
              <label for="remember">remember me </label>
              <input
                type="checkbox"
                name="remember"
                v-model="form.remember"
                class="w3-check"
              /><br />
              <br />
              <Link href="/forgot-password" class="w3-text-blue"
                >Forgot Password?</Link
              >
            </fieldset>
            <button type="submit" class="w3-btn w3-green w3-margin w3-block">
              Log in
            </button>
          </form>
        </div>
      </Layout>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from "../../Shared/Layout.vue";
import ValidationErrors from "../../Components/ValidationErrors.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  name: "Login",
  components: {
    Layout,
    ValidationErrors,
    Link,
  },
  props: {
    canResetPassword: Boolean,
    status: String,
  },
  setup() {
    const form = useForm({
      email: null,
      password: null,
      remember: false,
    });

    function sendForm() {
      form.post("/login");
      form.reset();
    }
    return { form, sendForm };
  },
};
</script>