<template>
  <div>
    <h1>Hello, {{ name }}!</h1>
    <p>In this course, we will use the following frameworks:</p>
    <ul>
      <li v-for="(framework, index) in frameworks" :key="index">
        {{ framework }}
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: 'Home',
    props: {
      name: {
        type: String,
        required: true
      },
      frameworks: {
        type: Array
      }
    }
  }
</script>
