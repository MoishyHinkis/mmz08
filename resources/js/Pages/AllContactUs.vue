<template>
  <div>
    <div class="w3-center w3-margin">
      <Link href="/contactUs/create" class="w3-orange"
        >back to contact us &rarr;</Link
      >
    </div>
    <div class="w3-content">
      <div
        class="w3-card w3-quarter w3-margin-right w3-mobile"
        v-for="contact in contact_us"
        :key="contact.id"
      >
        <x-on-ad :ad="contact" referrer="contactUs"> </x-on-ad>
        <h6 class="w3-center w3-margin">Client Details</h6>
        <br />
        <div class="w3-margin">
          Name: {{ contact.name }} <br />
          Email: {{ contact.email }} <br />
          Phone: {{ contact.phone }} <br />
        </div>

        <h6 class="w3-center w3-margin">Contact Us Details</h6>
        <br />
        <div class="w3-margin">
          <div v-if="contact.size != null">
            Size: {{ contact.size }} <br />

            Times: {{ contact.times }} <br />
            Text: {{ contact.text }} <br />
            Comments: {{ contact.comments }} <br />
            <div v-if="contact.file_path != null">
              <Link href="#"> File: {{ contact.file_path }} </Link>
            </div>
          </div>
          <div v-else>Subject: {{ contact.subject }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import XOnAd from "../Components/XOnAd.vue";
export default {
  name: "AllContactUs",
  components: {
    Link,
    XOnAd,
  },
  props: {
    contact_us: Array,
  },
};
</script>