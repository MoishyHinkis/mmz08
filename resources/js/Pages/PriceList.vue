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
              class="w3-col l2 m2 w3-mobile w3-margin-right w3-section w3-card"
              v-for="size in sizes"
              :key="size.id"
            >
              <div>
                <x-on-ad :ad="size" referrer="size" v-if="Authorization()">
                </x-on-ad>
                <button @click="showSize(size)">
                    <size :size="size"></size>
                    <!-- {{ size.path }} -->
                </button>
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
import { Link, useForm } from "@inertiajs/inertia-vue3";
import Layout from "../Shared/Layout.vue";
import Size from "../Components/Size.vue";
export default {
  name: "PriceList",
  components: {
    Layout,
    Size,
    Link,
    NewSizeForm,
    XOnAd,
  },
  props: {
    sizes: Array,
  },
  data() {
    return {
      AddNewSize: false,
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
    showSize(size) {
      const form = useForm(size);
      form.get(`/size/${size.id}`);
    },
  },
};
</script>