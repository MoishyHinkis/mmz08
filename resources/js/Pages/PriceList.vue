<template>
  <div>
    <div>
      <layout>
        <div class="w3-center">
          <h3>Price List</h3>
          <div v-if="Authorization()">
            <button
              class="w3-btn w3-green w3-margin"
              @click="AddNewSize = !AddNewSize"
            >
              Add New Size
            </button>
            <button class="w3-btn w3-green w3-margin">
              <Link href="/order">show all orders &rarr;</Link>
            </button>
          </div>
        </div>
        <new-size-form v-show="AddNewSize"></new-size-form>
        <div class="w3-container">
          <div class="w3-content">
            <div
              class="w3-col l2 m2 w3-margin w3-card w3-mobile"
              v-for="(ad, adKey) in ads"
              :key="adKey"
            >
              <div>
                <x-on-ad :ad="ad" Referrer="pricelist" v-if="Authorization()">
                </x-on-ad>
                <Link :href="`pricelist/${ad.name}`">
                  <ad :ad="ad" footerSign="fas fa-shekel-sign"></ad>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </layout>
    </div>
  </div>
</template>

<script>
import XOnAd from "../Components/XOnAd.vue";
import NewSizeForm from "../Components/NewSizeForm.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Layout from "../Shared/Layout.vue";
import Ad from "../Components/Ad.vue";
export default {
  name: "PriceList",
  components: {
    Layout,
    Ad,
    Link,
    NewSizeForm,
    XOnAd,
  },
  props: {
    ads: Array,
  },
  data() {
    return {
      AddNewSize: false,
      admin: "Mthinkis@gmail.com",
    };
  },
  methods: {
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