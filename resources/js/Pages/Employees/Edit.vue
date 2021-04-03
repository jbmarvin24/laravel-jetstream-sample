<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Employees
      </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form @submit.prevent="update">
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                  >
                    Name
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input
                      type="text"
                      name="name"
                      id="name"
                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 flex-1 block w-full rounded-md shadow-sm"
                      placeholder="First Name Last Name"
                      v-model="form.name"
                    />
                  </div>
                  <div>{{ form.errors.name }}</div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="birthday"
                    class="block text-sm font-medium text-gray-700"
                  >
                    Birthday
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input
                      type="date"
                      name="birthday"
                      id="birthday"
                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 flex-1 block w-full rounded-md shadow-sm"
                      v-model="form.birthday"
                    />
                  </div>
                  <div>{{ form.errors.name }}</div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="age"
                    class="block text-sm font-medium text-gray-700"
                  >
                    Age
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input
                      type="number"
                      name="age"
                      id="age"
                      class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 flex-1 block w-full rounded-md shadow-sm"
                      v-model="form.age"
                    />
                  </div>
                  <div>{{ form.errors.name }}</div>
                </div>
              </div>
            </div>
            <div
              class="flex justify-between px-4 py-3 bg-gray-50 text-right sm:px-6"
            >
              <button
                class="text-red-600 hover:underline"
                type="button"
                @click="destroy"
              >
                Delete Employee
              </button>
              <button
                type="submit"
                class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Update Employee
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetInputError from "@/Jetstream/InputError";

export default {
  components: {
    AppLayout,
    JetInput,
    JetLabel,
    JetInputError,
  },
  props: {
    employee: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: this.employee.name,
        birthday: this.employee.birthday,
        age: this.employee.age,
      }),
    };
  },
  methods: {
    update() {
      this.form.put(this.route("employees.update", this.employee.id));
    },
    destroy() {
      if (confirm("Are you sure you want to delete this employee?")) {
        this.$inertia.delete(this.route("employee.destroy", this.employee.id));
      }
    },
  },
};
</script>
