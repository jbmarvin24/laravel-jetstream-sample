<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Employment Statuses
      </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="mb-6 flex justify-between items-center">
        <inertia-link
          class="btn-indigo"
          :href="route('employment-statuses.create')"
        >
          <span class="mr-1">Create</span>
          <span class="hidden md:inline">Employment Status</span>
        </inertia-link>
      </div>
      <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="px-6 pt-6 pb-4">Id</th>
            <th class="px-6 pt-6 pb-4">Name</th>
            <th class="px-6 pt-6 pb-4">Description</th>
          </tr>
          <tr
            v-for="employmentStatus in employmentStatuses"
            :key="employmentStatus.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="border-t">
              <inertia-link
                :href="route('employment-statuses.edit', employmentStatus.id)"
                class="px-6 py-4 flex items-center"
              >
                {{ employmentStatus.id }}
              </inertia-link>
            </td>
            <td class="border-t">
              <inertia-link
                :href="route('employment-statuses.edit', employmentStatus.id)"
                class="px-6 py-4 flex items-center focus:text-indigo-600"
              >
                {{ employmentStatus.name }}
              </inertia-link>
            </td>
            <td class="border-t">
              <inertia-link
                :href="route('employment-statuses.edit', employmentStatus.id)"
                class="px-6 py-4 flex items-center"
              >
                {{ employmentStatus.description }}
              </inertia-link>
            </td>
            <td class="border-t w-px">
              <inertia-link
                :href="route('employment-statuses.edit', employmentStatus.id)"
                class="px-4 flex items-center"
              >
                <svg
                  class="block w-6 h-6 fill-current text-gray-400"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <polygon
                    points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"
                  />
                </svg>
              </inertia-link>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: {
    employmentStatuses: Array,
  },
};
</script>
