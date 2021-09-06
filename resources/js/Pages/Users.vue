<template>
  <div>
    <div>
      <Layout>
        <h3 class="w3-center">Users</h3>
        <div class="w3-text-blue w3-margin w3-center">
          <Link href="/">back to main page &rarr;</Link>
        </div>
        <div class="w3-content">
          <div
            v-for="user in users"
            :key="user.id"
            class="w3-card w3-margin w3-padding w3-quarter"
          >
            <div>
              <button @click="chooseUser(user)">
                Name: {{ user.name }} <br />
                Email: {{ user.email }} <br />
                Phone: {{ user.phone }} <br />
              </button>
            </div>
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
    return {};
  },
  methods: {
    chooseUser(user) {
      const User = useForm(user);
      User.get(`/user/${user.id}`, { onSuccess: () => User.reset() });
    },
  },
};
</script>