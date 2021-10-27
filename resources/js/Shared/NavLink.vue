<template>
  <Link :class="{ 'active': active }">
    <slot />
  </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  name: "NavLink",
  components: {
    Link,
  },
  props: {
    active: {
      type: Boolean,
      default: false
    }
  },
};
</script>

<style>
.active {
  font-weight: bold;
}
</style>