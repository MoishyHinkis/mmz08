<template>
  <div>
    <div class="w3-bar w3-orange">
      <Link
        class="w3-bar-item w3-hover-light-blue"
        v-for="(tab, tabKey) in tabs"
        :key="tabKey"
        :href="tab.path"
      >
        <div>
          {{ tab.name }}
        </div>
      </Link>
      <div v-if="$page.props.auth.user">
        <div v-if="$page.props.auth.user.email === admin">
          <Link href="/users" class="w3-bar-item w3-hover-light-blue"
            >Users</Link
          >
        </div>
        <div v-else>
          <Link href="/privatearea" class="w3-bar-item w3-hover-light-blue"
            >Private Area</Link
          >
        </div>
      </div>
      <div v-if="$page.props.auth.user">
        <Link
          class="w3-bar-item w3-right w3-hover-light-blue"
          href="/logout"
          method="post"
          as="button"
          >Logout</Link
        >
      </div>
      <div v-else>
        <Link class="w3-bar-item w3-right w3-hover-light-blue" href="/register"
          >Register</Link
        >
        <Link href="/login" class="w3-bar-item w3-right w3-hover-light-blue"
          >Log in</Link
        >
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  name: "NavBa",
  components: {
    Link,
  },
  data() {
    return {
      admin: "Mthinkis@gmail.com",
      tabs: [
        {
          name: "Main",
          path: "/main",
        },
        {
          name: "Price List",
          path: "/pricelist",
        },
        {
          name: "Past Bulletins",
          path: "/pastbulletins",
        },
        {
          name: "Contact Us",
          path: "/contactus/create",
        },
      ],
    };
  },
};
</script>