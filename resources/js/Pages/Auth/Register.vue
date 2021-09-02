<template>
  <div>
    <div>
      <layout>
        <div class="w3-card">
          <form @submit.prevent="sendForm" class="w3-container w3-margin">
            <h3 class="w3-border-bottom w3-center">Register Form</h3><br>
            <validation-errors></validation-errors>
            <label for="name">name</label><br />
            <input type="text" name="name" v-model="form.name" class="w3-input" /><br /><br />
            <label for="email">email</label><br />
            <input type="email" name="email" v-model="form.email" class="w3-input"/><br /><br />
            <label for="phone">phone</label><br />
            <input type="number" name="phone" v-model="form.phone" class="w3-input"/><br /><br />
            <label for="password">password</label><br />
            <input
              type="password"
              name="password"
              v-model="form.password"
              class="w3-input"
            /><br /><br />
            <label for="password password_confirmation"
              >password password_confirmation</label
            ><br />
            <input
              type="password"
              name="password confirmation"
              v-model="form.password_confirmation"
              class="w3-input"
            /><br /><br />
            <button class="w3-btn w3-green w3-margin" type="submit">regist</button>
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