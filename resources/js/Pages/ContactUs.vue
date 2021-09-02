<template>
  <div>
    <div>
      <layout>
        <div v-if="Authorization()" class="w3-center">
          <button class="w3-btn w3-green w3-margin">
            <Link href="/contactus">show all forms &rarr;</Link>
          </button>
        </div>
          <div class="w3-mobile w3-card center form">
            <h3 class="w3-border-bottom w3-center">Contact Us Form</h3>
            <validation-errors></validation-errors>
            <form @submit.prevent="sendForm" class="w3-container w3-margin">
              <div v-if="!$page.props.auth.user">
                <label for="name">Name</label><br />
                <input
                  type="text"
                  name="name"
                  v-model="form.name"
                  placeholder="name"
                  class="w3-input"
                /><br /><br />
                <label for="email">Email</label><br />
                <input
                  type="email"
                  name="email"
                  v-model="form.email"
                  placeholder="Email"
                  class="w3-input"
                /><br /><br />
                <label for="phone">Phone</label><br />
                <input
                  type="number"
                  name="phone"
                  v-model="form.phone"
                  placeholder="Phone"
                  class="w3-input"
                /><br /><br />
              </div>
              <label for="subject">Subject</label><br />
              <textarea
                name="subject"
                cols="30"
                rows="5"
                v-model="form.subject"
                class="w3-input"
              ></textarea
              ><br /><br />
              <div class="w3-center">
                <button class="w3-btn w3-green w3-margin" type="submit">
                  Send Form
                </button>
              </div>
            </form>
        </div>
      </layout>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ValidationErrors from ".././Components/ValidationErrors.vue";
export default {
  name: "ContactUs",
  components: {
    Layout,
    Link,
    ValidationErrors,
  },
  data() {
    return {
      admin: "Mthinkis@gmail.com",
      form: useForm({
        name: null,
        email: null,
        phone: null,
        subject: null,
      }),
    };
  },
  methods: {
    sendForm() {
      if (this.$page.props.auth.user) {
        this.form.name = this.$page.props.auth.user.name;
        this.form.email = this.$page.props.auth.user.email;
        this.form.phone = this.$page.props.auth.user.phone;
      }
      alert("you order recived");
      this.form.post("/contactus");
      this.form.reset();
    },
    Authentication() {
      if (this.$page.props.auth.user) {
        return true;
      }
      return false;
    },
    Authorization() {
      try {
        return this.$page.props.auth.user.email === this.admin;
      } catch (error) {
        return false;
      }
    },
  },
};
</script>
<style>
  .space{
    color:  rgb(236, 239, 248)
  }
  .center{
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  .form{
    width: 25%;
  }
</style>