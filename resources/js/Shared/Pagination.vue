<template>
  <Component 
    v-for="(link, key) in links"
    :key="key"
    :is="link.url ? 'Link' : 'span'"
    :href="link.url"
    v-html="link.label"
    class="px-1"
    :class="{
      'text-gray-400': !link.url,
      'border-2 border-gray-500': link.active
    }"
  />
</template>

<script>
  export default {
    name: 'Pagination',
    props: {
      links: {
        type: Object,
        required: true
      },
    },
  }
</script>