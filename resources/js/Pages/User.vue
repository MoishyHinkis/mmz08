<template>
  <div>
    <div>
      <Layout>
        <div class="w3-center w3-margin">
          <h3>{{ user.name }}</h3>
          <Link href="/users" class="w3-text-blue w3-margin"
            >back &rarr;</Link
          >
        </div>
        <div class="w3-cell-row">
          <div class="w3-cell w3-margin w3-card">
            <h4 class="w3-center">orders</h4>
            <div class="w3-card-4 w3-margin">
              <div v-if="orders.length === 0">
                there no orders from this user
              </div>
              <div v-else v-for="order in orders" :key="order.key">
                <div class="w3-margin">
                  Size: {{ order.size }} <br />
                  Times: {{ order.times }} <br />
                  Text: {{ order.text }} <br />
                  Comments: {{ order.comments }} <br />
                  <div v-show="order.file_path">
                    File: {{ order.file_path }}
                  </div>
                  Price: {{ order.price }}
                </div>
              </div>
            </div>
          </div>
          <div class="w3-cell w3-margin w3-card">
            <h4 class="w3-center">contact us</h4>
            <div class="w3-card-4 w3-margin">
              <div v-if="contactus.length === 0">
                there no contactus from this user
              </div>
              <div v-else v-for="contact in contactus" :key="contact.key">
                <div class="w3-margin">Subject: {{ contact.subject }}</div>
              </div>
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