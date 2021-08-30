<template>
  <div>
    <div class="w3-center w3-margin">
      <Link :href="`/${Back}`" class="w3-orange"
        >back to {{ Back }} &rarr;</Link
      >
    </div>
    <div class="w3-row">
      <div
        class="w3-card w3-quarter w3-margin"
        v-for="order in orders"
        :key="order.id"
      >
        <x-on-ad :ad="order" :Referrer="Referrer">
          <h6 class="w3-center w3-margin">Client Details</h6>
          <br />
          <div class="w3-margin">
            Name: {{ order.name }} <br />
            Email: {{ order.email }} <br />
            Phone: {{ order.phone }} <br />
          </div>

          <h6 class="w3-center w3-margin">Order Details</h6>
          <br />
          <div class="w3-margin">
            <div v-if="order.size != null">
              Size: {{ order.size }} <br />

              Times: {{ order.times }} <br />
              Text: {{ order.text }} <br />
              Comments: {{ order.comments }} <br />
              <div v-if="order.file_path != null">
                <Link href="#"> File: {{ order.file_path }} </Link>
              </div>
            </div>
            <div v-else>Subject: {{ order.subject }}</div>
          </div>
        </x-on-ad>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import XOnAd from "../Components/XOnAd.vue";
export default {
  name: "AllOrders",
  components: {
    Link,
    XOnAd,
  },
  props: {
    orders: Array,
    Back: String,
    Referrer: String
  },
};
</script>