<template>
  <main class="grid place-items-center min-h-screen">
    <Head title="Login" />

    <section class="bg-white p-8 rounded-xl max-w-md mx-auto border">
      <h1 class="text-3xl">Login</h1>

      <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
          <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
          <input type="email" class="border border rounded p-2 w-full" name="email" id="email" v-model="form.email" required>
          <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
          <input type="password" class="border border rounded p-2 w-full" name="password" id="password" v-model="form.password" required>
          <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
          <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 disabled:bg-gray-500" :disabled="form.processing">Login</button>
        </div>
      </form>
    </section>
  </main>
</template>

<script>
  export default {
    name: 'Login',
    layout: null,
    data() {
      return {
        form: this.$inertia.form({
          email: '',
          password: ''
        })
      }
    },
    methods: {
      submit() {
        this.form.post('/login')
      }
    },
  }
</script>

<style lang="scss" scoped>

</style>