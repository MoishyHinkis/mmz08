<template>
  <div>
    <div>
      <layout>
        <div v-if="auth">
          <div v-if="$page.props.auth.user.email === admin">
            <Link href="/order">show all orders &rarr;</Link>

            <button class="w3-btn" @click="AddNewSize = !AddNewSize">
              Add New Size
            </button>
          </div>
        </div>
        <new-size-form v-show="AddNewSize"></new-size-form>
        <div class="w3-container">
          <div class="w3-content">
            <div
              class="w3-quarter w3-margin w3-card w3-mobile"
              v-for="(ad, adKey) in ads"
              :key="adKey"
            >
              <div v-if="auth">
                <div v-if="$page.props.auth.user.email === admin">
                  <x-on-ad :ad="ad" footerSign="fas fa-shekel-sign" Referrer="pricelist">
                    <Link :href="`pricelist/${ad.name}`">
                      <ad :ad="ad" footerSign="fas fa-shekel-sign" ></ad>
                    </Link>
                  </x-on-ad>
                </div>
                <div v-else>
                  <Link :href="`pricelist/${ad.name}`">
                    <ad :ad="ad" footerSign="fas fa-shekel-sign" ></ad>
                  </Link>
                </div>
              </div>
              <div v-else>
                <Link :href="`pricelist/${ad.name}`">
                  <ad :ad="ad" footerSign="fas fa-shekel-sign" ></ad>
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
import NewSizeForm from "../Components/NewSizeForm.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Layout from "../Shared/Layout.vue";
import Ad from "../Components/Ad.vue";
import XOnAd from "../Components/XOnAd.vue";
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
      auth: this.$page.props.auth.user,
    };
  },
};
</script>