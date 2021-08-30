<template>
  <div>
    <layout>
      <div class="w3-display-container">
        <div class="w3-display-right w3-margin w3-text-blue">
          <Link href="/pricelist" class="w3-margin"
            >back to price list &rarr;</Link
          ><br />
          <Link href="/" class="w3-margin">back to main page &rarr;</Link>
        </div>
        <ad :ad="ad" class="image"></ad>
        <div class="w3-display-topmiddle w3-margin w3-border">
          <div class="w3-center w3-margin">
            <validation-errors></validation-errors>
            <form @submit.prevent="sendForm">
              <div v-if="!$page.props.auth.user">
                <label for="name">name</label><br />
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
              <label for="times">Times</label><br />
              <input
                type="number"
                name="times"
                v-model="form.times"
              /><br /><br />

              <label for="text">Text</label><br />
              <textarea
                name="text"
                cols="30"
                rows="5"
                v-model="form.text"
                placeholder="the text you want in the ad goes here"
              ></textarea
              ><br /><br />
              <label for="comments">Comments</label><br />
              <textarea
                name="comments"
                cols="30"
                rows="5"
                v-model="form.comments"
                placeholder="if you have any comments this is the palve"
              ></textarea
              ><br /><br />
              <input type="file" @input="form.file = $event.target.files[0]" />
              <br />
              <button type="submit" class="w3-btn w3-green">Buy</button>
            </form>
          </div>
        </div>
      </div>
    </layout>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from "../Shared/Layout.vue";
import Ad from "../Components/Ad.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ValidationErrors from "@/Components/ValidationErrors.vue";
export default {
  name: "Buy",
  components: {
    Layout,
    Ad,
    Link,
    ValidationErrors,
  },
  props: {
    ad: Object,
  },
  data() {
    return {
      form: useForm({
        size: null,
        name: null,
        email: null,
        phone: null,
        times: null,
        text: null,
        comments: null,
        file: null,
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
      this.form.size = this.ad.name;
      alert("you order recived");
      this.form.post("/order");
      this.form.reset();
    },
  },
};
</script>

<style scoped>
.image {
  height: auto;
  width: 25%;
  justify-items: center;
}
</style>>
