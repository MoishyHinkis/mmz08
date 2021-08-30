<template>
  <div>
    <div>
      <Layout>
        <div class="w3-center">
          <h3>{{ user.name }}</h3>
          <Link href="/users" class="w3-text-blue w3-margin"
            >back to users &rarr;</Link
          >
        </div>
        <div class="w3-display-container">
          <div class="w3-display-left w3-margin">
            <div v-for="order in orders" :key="order.key" class="w3-border">
                Size: {{ order.size }} <br>
                Times: {{ order.times }} <br>
                Text: {{ order.text }} <br>
                Comments: {{ order.comments }} <br>
                File: {{ order.file_path }}
            </div>
            <div v-if="orders.length === 0">there no orders from this user</div>
          </div>
          <div class="w3-display-right w3-margin">
            <div v-for="contact in contactus" :key="contact.key" class="w3-border">
              Subject: {{ contact.subject }}
            </div>
            <div v-if="contactus.length === 0">
              there no contactus from this user
            </div>
          </div>
        </div>
      </Layout>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Layout from "../Shared/Layout.vue";
export default {
  name: "User",
  components: {
    Link,
    Layout,
  },
  props: {
    user: Object,
    orders: Array,
    contactus: Array,
  },
};
</script>