<template>
  <Layout>
    <h1>Users</h1>
    <div style="margin-top: 600px;">
      <p>The current time is {{ time }}</p>
      <Link href="/users" preserve-scroll>Refresh</Link>
    </div>
  </Layout>
</template>

<script>
  import Layout from '../Shared/Layout'
  import Nav from '../Shared/Nav'

  export default {
    name: 'Users',
    components: {
      Layout,
      Nav,
    },
  }
</script>