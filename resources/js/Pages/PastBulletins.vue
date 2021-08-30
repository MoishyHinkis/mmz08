<template>
  <div>
    <div>
      <layout>
        <div>
          <div v-if="auth">
            <div v-if="$page.props.auth.user.email === admin">
              <button class="w3-btn" @click="AddNewBulletin = !AddNewBulletin">
                Add New Bulletin
              </button>
            </div>
          </div>
          <new-bulletin-form v-show="AddNewBulletin"></new-bulletin-form>
          <div class="w3-row">
              <div
                class="w3-quarter w3-margin w3-card"
                v-for="(ad, adKey) in ads"
                :key="adKey"
              >
                <div v-if="auth">
                  <div v-if="$page.props.auth.user.email === admin">
                    <x-on-ad :ad="ad" Referrer="pastbulletins">
                      <a :href="ad.link" target="_blank">
                        <Ad :ad="ad"></Ad>
                      </a>
                    </x-on-ad>
                  </div>
                  <div v-else>
                    <a :href="ad.link" target="_blank">
                      <Ad :ad="ad"></Ad>
                    </a>
                  </div>
                </div>
                <div v-else>
                  <a :href="ad.link" target="_blank">
                    <Ad :ad="ad"></Ad>
                  </a>
                </div>
            </div>
          </div>
        </div>
      </layout>
    </div>
  </div>
</template>

<script>
import Ad from "../Components/Ad.vue";
import Layout from "../Shared/Layout.vue";
import NewBulletinForm from "../Components/NewBulletinForm.vue";
import XOnAd from "../Components/XOnAd.vue";
export default {
  name: "PastBuletins",
  components: {
    Ad,
    Layout,
    NewBulletinForm,
    XOnAd,
  },
  props: {
    ads: Array,
  },
  data() {
    return {
      AddNewBulletin: false,
      admin: "Mthinkis@gmail.com",
      auth: this.$page.props.auth.user,
    };
  },
};
</script>