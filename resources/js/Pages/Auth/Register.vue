<template>
  <div>
    <div>
      <layout>
        <div class="w3-center">
          <form @submit.prevent="sendForm">
            <h3>Register Form</h3>
            <validation-errors></validation-errors>
            <label for="name">name</label><br />
            <input type="text" name="name" v-model="form.name" /><br /><br />
            <label for="email">email</label><br />
            <input type="email" name="email" v-model="form.email" /><br /><br />
            <label for="phone">phone</label><br />
            <input type="number" name="phone" v-model="form.phone" /><br /><br />
            <label for="password">password</label><br />
            <input
              type="password"
              name="password"
              v-model="form.password"
            /><br /><br />
            <label for="password password_confirmation"
              >password password_confirmation</label
            ><br />
            <input
              type="password"
              name="password password_confirmation"
              v-model="form.password_confirmation"
            /><br /><br />
            <button class="w3-btn" type="submit">regist</button>
          </form>
        </div>
      </layout>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from "../../Shared/Layout.vue";
import ValidationErrors from '../../Components/ValidationErrors.vue'
export default {
  name: "Register",
  components: {
    Layout,
    ValidationErrors
  },
  setup() {
    const form = useForm({
      name: null,
      email: null,
      phone: null,
      password: null,
      password_confirmation: null,
      terms: false
    });
    function sendForm() {
      form.post("/register");
      form.reset();
    }
    return { form, sendForm };
  },
};
</script>