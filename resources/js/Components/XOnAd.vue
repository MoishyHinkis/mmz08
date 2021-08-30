<template>
  <div>
    <div>
      <font-awesome-icon
        class="w3-text-red w3-margin-left"
        :icon="delet"
        @click="deleted"
      />
      <Link :href="`/${Referrer}/${ad.id}/edit`">
        <font-awesome-icon class="w3-margin-left" :icon="edit" />
      </Link>
    </div>
    <div>
      <slot />
    </div>
  </div>
</template>

<script>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faTimes } from "@fortawesome/free-solid-svg-icons";
import { faEdit } from "@fortawesome/free-solid-svg-icons";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  name: "XOnAd",
  components: {
    FontAwesomeIcon,
    Link,
  },
  props: {
    ad: Object,
    Referrer: String
  },
  setup(props) {
    const form = useForm(props.ad);
    const delet = faTimes;
    const edit = faEdit;
    function deleted() {
      form.delete(`/${props.Referrer}/${props.ad.id}`);
    }
    return { delet, edit, deleted };
  },
};
</script>