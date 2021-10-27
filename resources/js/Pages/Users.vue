<template>
  <div>
    <h1>Users</h1>
    <Nav />
    <div style="margin-top: 600px;">
      <p>The current time is {{ time }}</p>
      <Link href="/users" preserve-scroll>Refresh</Link>
    </div>
  </div>
</template>

<script>
  import { Link } from '@inertiajs/inertia-vue3'
  import Nav from '../Shared/Nav'

  export default {
    name: 'Users',
    components: {
      Nav,
      Link
    },
    props: {
      time: {
        type: String,
      },
    },
  }
</script>
