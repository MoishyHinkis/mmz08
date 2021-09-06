<template>
  <div>
    <div>
      <Link
        class="w3-bar-item w3-hover-light-blue w3-mobile"
        v-for="(tab, tabKey) in tabs"
        :key="tabKey"
        :href="tab.path"
      >
        {{ tab.name }}
      </Link>
    </div>
    <div v-if="$page.props.auth.user">
      <div v-if="$page.props.auth.user.email === admin">
        <Link href="/user" class="w3-bar-item w3-hover-light-blue w3-mobile"
          >Users</Link
        >
      </div>
      <div v-else>
        <button
          @click="privateArea"
          class="w3-bar-item w3-hover-light-blue w3-mobile"
        >
          Private Area
        </button>
      </div>
      <div>
        <Link
          class="w3-bar-item w3-right w3-hover-light-blue w3-mobile"
          href="/logout"
          method="post"
          as="button"
          >Logout</Link
        >
      </div>
    </div>
    <div v-else>
      <div>
        <Link
          class="w3-bar-item w3-right w3-hover-light-blue w3-mobile"
          href="/register"
          >Register</Link
        >
        <Link
          href="/login"
          class="w3-bar-item w3-right w3-hover-light-blue w3-mobile"
          >Log in</Link
        >
      </div>
    </div>
    <div class="w3-bar-item w3-hide-small">
      <img src="../../images/logo.jpg" style="width: 60px" />
    </div>
  </div>
</template>

<script>
import { Link, useForm } from "@inertiajs/inertia-vue3";
export default {
  name: "Tabs",
  components: {
    Link,
  },
  data() {
    return {
      admin: this.$page.props.admin,
      tabs: [
        {
          name: 'Main',
          path: "/main",
        },
        {
          name: "Price List",
          path: "/size",
        },
        {
          name: "Past Bulletins",
          path: "/bulletin",
        },
        {
          name: "Contact Us",
          path: "/contactUs/create",
        },
      ],
    };
  },
  methods: {
    privateArea() {
      const user = useForm(this.$page.props.auth.user);
      user.get(`/user/${user.id}`);
    },
  },
};
</script>