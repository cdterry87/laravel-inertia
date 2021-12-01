<template>
  <Head>
    <title>Users</title>
  </Head>

  <div class="flex justify-between">
    <h1>Users</h1>
    <input
      type="text"
      placeholder="Search..."
      class="border rounded px-2"
      v-model="search"
    />
  </div>

  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="(user, key) in users.data" :key="key">
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ user.name }}
                </td>
                <td
                  class="
                    px-6
                    py-4
                    whitespace-nowrap
                    text-right text-sm
                    font-medium
                  "
                >
                  <a
                    :href="`/users/${user.id}/edit`"
                    class="text-indigo-600 hover:text-indigo-900"
                    >Edit</a
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Paginator -->
  <div class="mt-6">
    <Pagination :links="users.links" />
  </div>
</template>

<script>
import Pagination from "../Shared/Pagination.vue";

export default {
  name: "Users",
  props: {
    users: {
      type: Object,
      required: true,
    },
    filters: {
      type: Object,
      default: () => {},
    },
  },
  components: {
    Pagination,
  },
  data() {
    return {
      search: this.filters.search || "",
    };
  },
  watch: {
    search(value) {
      this.$inertia.get(
        "/users",
        {
          search: value,
        },
        {
          preserveState: true,
          replace: true,
        }
      );
    },
  },
};
</script>