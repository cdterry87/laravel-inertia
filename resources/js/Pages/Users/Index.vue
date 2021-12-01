<template>
  <Head>
    <title>Users</title>
  </Head>

  <div class="flex justify-between">
    <div class="flex items-center">
      <h1 class="text-3xl">Users</h1>

      <Link href="/users/create" class="text-blue-500 text-sm ml-3">
        Create User
      </Link>
    </div>

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
import Pagination from "../../Shared/Pagination.vue";
import { Inertia } from "@inertiajs/inertia"
import { throttle } from "lodash";

export default {
  name: "UsersIndex",
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
    search: throttle(function(value) {
      Inertia.get('/users', { search: value }, { preserveState: true, replace: true })
    }, 500)
  }
};
</script>