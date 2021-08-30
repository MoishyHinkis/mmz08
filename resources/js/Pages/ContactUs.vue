<template>
  <div>
    <div>
      <layout>
        <div class="w3-display-container w3-margin">
          <div v-if="$page.props.auth.user">
            <div v-if="$page.props.auth.user.email === admin">
              <Link href="/contactus">show all forms</Link>
            </div>
          </div>
          <div class="w3-display-topmiddle w3-border w3-padding">
            <h3 class="w3-border-bottom">Contact Us Form</h3>
            <validation-errors></validation-errors>
            <form @submit.prevent="sendForm">
              <div v-if="!$page.props.auth.user">
                <label for="name">Name</label><br />
                <input
                  type="text"
                  name="name"
                  v-model="form.name"
                  placeholder="name"
                /><br /><br />
                <label for="email">Email</label><br />
                <input
                  type="email"
                  name="email"
                  v-model="form.email"
                  placeholder="Email"
                /><br /><br />
                <label for="phone">Phone</label><br />
                <input
                  type="number"
                  name="phone"
                  v-model="form.phone"
                  placeholder="Phone"
                /><br /><br />
              </div>
              <label for="subject">Subject</label><br />
              <textarea
                name="subject"
                cols="30"
                rows="5"
                v-model="form.subject"
              ></textarea
              ><br /><br />
              <button class="w3-btn w3-green w3-border" type="submit">
                Send Form
              </button>
            </form>
          </div>
        </div>
      </layout>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ValidationErrors from '.././Components/ValidationErrors.vue';
export default {
  name: "ContactUs",
  components: {
    Layout,
    Link,
    ValidationErrors
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
        alert(this.$page.props.auth.user.phone);
        this.form.name = this.$page.props.auth.user.name;
        this.form.email = this.$page.props.auth.user.email;
        this.form.phone = this.$page.props.auth.user.phone;
      }
      alert("you order recived");
      this.form.post("/contactus");
      this.form.reset();
    },
  },
};
</script>