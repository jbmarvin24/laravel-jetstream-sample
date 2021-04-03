<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Employees
      </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="mb-6 flex justify-between items-center">
        <inertia-link class="btn-indigo" :href="route('employees.create')">
          <span class="mr-1">Create</span>
          <span class="hidden md:inline">Employee</span>
        </inertia-link>
      </div>
      <div class="bg-white rounded-md shadow overflow-x-auto">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="px-6 pt-6 pb-4">Id</th>
            <th class="px-6 pt-6 pb-4">Name</th>
            <th class="px-6 pt-6 pb-4">Birthday</th>
            <th class="px-6 pt-6 pb-4">Age</th>
          </tr>
          <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t px-6 py-4">1</td>
            <td class="border-t px-6 py-4">Marvin</td>
            <td class="border-t px-6 py-4">6/24/1998</td>
            <td class="border-t px-6 py-4">22</td>
            <td class="border-t px-4 w-6 h-6 text-gray-400">></td>
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
};
</script>