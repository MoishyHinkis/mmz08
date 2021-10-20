<script>
import { reactive } from 'vue';
import { Inertia } from "@inertiajs/inertia";
export default {
  name: "Alert",
  props: {
    massage: String,
    redirect: String,
  },
  created() {
      alert(massage);
      Inertia.get(this.redirect);
  },
};
</script>