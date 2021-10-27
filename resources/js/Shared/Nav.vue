<template>
  <nav class="ml-6">
    <ul class="flex space-x-4 list-inside">
      <li><NavLink href="/" :active="$page.component === 'Home'" >Home</NavLink></li>
      <li><NavLink href="/users" :active="$page.component === 'Users'" >Users</NavLink></li>
      <li><NavLink href="/settings" :active="$page.component === 'Settings'" >Settings</NavLink></li>
      <li><Link href="/logout" method="POST" as="button">Log Out</Link></li>
    </ul>
  </nav>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import NavLink from "./NavLink";

export default {
  name: "Nav",
  components: {
    Link,
    NavLink
  },
};
</script>

