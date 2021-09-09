<template>
  <div>
    <div class="flex items-center p-2 space-x-3">
      <i class="fas fa-times w3-text-red" @click="deleted"> </i>
      <Link :href="`/${referrer}/${ad.id}/edit`">
        <i class="fas fa-pen-fancy"></i>
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  name: "XOnAd",
  components: {
    Link,
  },
  props: {
    ad: Object,
    referrer: String,
  },
  setup(props) {
    const form = useForm(props.ad);
    function deleted() {
      form.delete(`/${props.referrer}/${props.ad.id}`);
    }
    return { deleted };
  },
};
</script>
