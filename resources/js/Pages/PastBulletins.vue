<template>
  <div>
    <div>
      <layout>
        <div class="w3-center">
          <h3>Past Bulletins</h3>
          <div v-if="Authorization()">
            <div v-if="$page.props.auth.user.email === admin">
              <button
                class="w3-btn w3-green w3-margin"
                @click="AddNewBulletin = !AddNewBulletin"
              >
                Add New Bulletin
              </button>
            </div>
          </div>
          <new-bulletin-form v-show="AddNewBulletin"></new-bulletin-form>
          <div class="w3-container">
            <div class="w3-content">
              <div
                class="w3-col l2 m2 w3-margin-right w3-section w3-card w3-mobile"
                v-for="bulletin in bulletins"
                :key="bulletin.id"
              >
                <div>
                  <x-on-ad
                    :ad="bulletin"
                    referrer="bulletin"
                    v-if="Authorization()"
                  >
                  </x-on-ad>
                  <a :href="bulletin.link" target="_blank">
                    <bulletin :bulletin="bulletin"></bulletin>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </layout>
    </div>
  </div>
</template>

<script>
import Bulletin from "../Components/Bulletin.vue";
import Layout from "../Shared/Layout.vue";
import NewBulletinForm from "../Components/NewBulletinForm.vue";
import XOnAd from "../Components/XOnAd.vue";
export default {
  name: "PastBuletins",
  components: {
    Bulletin,
    Layout,
    NewBulletinForm,
    XOnAd,
  },
  props: {
    bulletins: Array,
  },
  data() {
    return {
      AddNewBulletin: false,
      admin: this.$page.props.admin,
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