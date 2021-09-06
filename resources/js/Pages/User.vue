<template>
  <div>
    <div>
      <Layout>
        <div class="w3-center w3-margin">
          <h3>{{ user.name }}</h3>
          <Link href="/user" class="w3-text-blue w3-margin"
            >back to {{ backTo }} &rarr;</Link
          >
        </div>
        <div class="w3-cell-row">
          <div class="w3-cell w3-margin w3-card">
            <h4 class="w3-center">orders</h4>
            <div class="w3-margin break">
              <div v-if="orders.length === 0" class="w3-center w3-card-4">
                there no orders from this user
              </div>
              <div v-else v-for="order in orders" :key="order.id">
                <div v-if="newWeek(order, orders)" class="w3-center w3-blue">
                  order recived for {{ getWeek(order) + 1 }}
                </div>
                <div class="w3-margin w3-center w3-card-4 w3-padding">
                  Size: {{ order.size }} <br />
                  Times: {{ order.times }} <br />
                  Text: {{ order.text }} <br />
                  Comments: {{ order.comments }} <br />
                  <div v-show="order.file_path">
                    File: {{ order.file_path }}
                  </div>
                  Price: {{ order.price }} <br />
                  Ordered on: {{ days[getDay(order)] }}
                </div>
              </div>
            </div>
          </div>
          <div class="w3-cell w3-margin w3-card">
            <h4 class="w3-center">contact us</h4>
            <div class="w3-margin break">
              <div v-if="contactUs.length === 0" class="w3-center w3-card-4">
                there no contact us from this user
              </div>
              <div v-else v-for="contact in contactUs" :key="contact.id">
                <div
                  v-if="newWeek(contact, contactUs)"
                  class="w3-center w3-blue"
                >
                  order recived for {{ getWeek(contact) + 1 }}
                </div>
                <div class="w3-margin w3-card-4">
                  Subject: {{ contact.subject }} <br />
                  Sent on: {{ days[getDay(contact)] }}
                </div>
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
    contactUs: Array,
  },
  data() {
    return {
      days: [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Suterday",
      ],
    };
  },
  computed: {
    backTo() {
      if (this.$page.props.auth.user.email === this.$page.props.admin) {
        return "users";
      } else return "main";
    },
  },
  methods: {
    getDay(order) {
      let date = new Date(order.created_at);
      return date.getDay();
    },
    getWeek(order) {
      try {
        let date = new Date(order.created_at);
        let oneJan = new Date(date.getFullYear(), 0, 1);
        let numberOfDays = Math.floor((date - oneJan) / (24 * 60 * 60 * 1000));
        let result = Math.ceil((date.getDay() + 1 + numberOfDays) / 7);
        return result;
      } catch (error) {
        return -1;
      }
    },
    newWeek(order, orders) {
      let week = this.getWeek(order);
      let previousOrder = orders.indexOf(order) - 1;
      let previousWeek = this.getWeek(orders[previousOrder]);
      let newWeek = week != previousWeek;
      return newWeek;
    },
  },
};
</script>

<style scoped>
.break {
  word-break: break-all;
}
</style>