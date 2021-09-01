<template>
  <div>
    <div>
      <Layout>
        <h3 class="w3-center">Users</h3>
        <Link href="/" class="w3-text-blue w3-margin"
          >back to main page &rarr;</Link
        >
        <div class="w3-row">
          <div v-for="user in users" :key="user.id">
            <button @click="chooseUser(user)">
              <div class="w3-card w3-margin w3-padding">
                Name: {{ user.name }} <br />
                Email: {{ user.email }} <br />
                Phone: {{ user.phone }} <br />
              </div>
            </button>
          </div>
        </div>
      </Layout>
    </div>
  </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  name: "Users",
  components: {
    Link,
    Layout,
  },
  props: {
    users: Array,
  },
  data() {
    return {
      user: useForm(null),
    };
  },
  methods: {
    chooseUser(user) {
      (this.user = useForm(user)), this.user.get("/user");
      this.user.reset();
    },
  },
};
</script>