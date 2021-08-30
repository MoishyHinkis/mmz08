<template>
  <div>
    <div>
      <Layout>
        <h3 class="w3-center">Users</h3>
        <Link href="/" class="w3-text-blue w3-margin"
          >back to main page &rarr;</Link
        >
        <div v-for="user in users" :key="user.id">
          <div class="w3-row">
            <Link :href="`/user/${user.name}`">
              <div class="w3-card w3-quarter w3-margin">
                Name: {{ user.name }} <br />
                Email: {{ user.email }} <br />
                Phone: {{ user.phone }} <br />
              </div>
            </Link>
          </div>
        </div>
      </Layout>
    </div>
  </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  name: "Users",
  components: {
    Link,
    Layout,
  },
  props: {
    users: Array,
  },
};
</script>