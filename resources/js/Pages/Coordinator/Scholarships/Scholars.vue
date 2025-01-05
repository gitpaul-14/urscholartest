<template>
  <div class="flex flex-col items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-6xl mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6 text-center">
        Scholars for {{ scholarship.name }}
      </h1>

      <div class="flex items-center justify-between mb-6">
        <Link :href="`/scholarships`" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Back
        </Link>

        <form @submit.prevent="uploadCSV" class="flex items-center space-x-4">
          <input
            type="file"
            @change="handleFileUpload"
            class="file-input file-input-bordered file-input-primary"
          />
          <button type="submit" class="btn btn-primary">Upload CSV</button>
        </form>
      </div>

      <table class="table w-full border border-gray-200 bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-4 text-left">#</th>
            <th class="p-4 text-left">First Name</th>
            <th class="p-4 text-left">Last Name</th>
            <th class="p-4 text-left">Email</th>
            <th class="p-4 text-left">Course</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(scholar, index) in scholars"
            :key="scholar.id"
            class="hover:bg-gray-50"
          >
            <td class="p-4">{{ index + 1 }}</td>
            <td class="p-4">{{ scholar.first_name }}</td>
            <td class="p-4">{{ scholar.last_name }}</td>
            <td class="p-4">{{ scholar.email }}</td>
            <td class="p-4">{{ scholar.course }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
  scholarship: Object,
  scholars: Array
});

const form = useForm({
  file: null,
});

const handleFileUpload = (event) => {
  form.file = event.target.files[0];
};

const uploadCSV = () => {
  form.post(`/scholarships/${props.scholarship.id}/upload`, {
    preserveScroll: true,
  });
};
</script>