<template>
  <div>
    <div class="w3-center w3-margin">
      <Link :href="`/${back}`" class="w3-orange"
        >back to {{ back }} &rarr;</Link
      >
    </div>
    <div class="w3-content">
      <div
        class="w3-card w3-quarter w3-margin-right w3-mobile"
        v-for="order in orders"
        :key="order.id"
      >
        <x-on-ad :ad="order" :referrer="referrer"> </x-on-ad>
        <h6 class="w3-center w3-margin">Client Details</h6>
        <br />
        <div class="w3-margin">
          Name: {{ order.name }} <br />
          Email: {{ order.email }} <br />
          Phone: {{ order.phone }} <br />
        </div>

        <h6 class="w3-center w3-margin">{{ referrer }} Details</h6>
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
    back: String,
    referrer: String,
  },
};
</script>