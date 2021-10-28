<template>
  <Head>
    <title>My App</title>
    <meta description="Information about my app" head-key="description" />
  </Head>
  <div>
    <section class="p-6 bg-gray-200">
      <header>
        <div class="flex items-center justify-between">
          <h1 class="font-bold text-lg">My App</h1>
          <Nav />
        </div>
        <div class="mt-6 text-center">
          <p>Welcome back, {{ username }}</p>
        </div>
      </header>
    </section>

    <section class="p-6">
      <slot />
    </section>
  </div>
</template>

<script>
  import Nav from './Nav.vue'

  export default {
    name: 'Layout',
    components: {
      Nav,
    },
    computed: {
      username () {
        return this.$page.props.auth.user.username 
      }
    },
  }
</script>
