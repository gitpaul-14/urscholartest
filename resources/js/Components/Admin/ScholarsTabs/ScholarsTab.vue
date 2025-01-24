<template>
  <div class="w-full">
    <!-- line sections -->
    <div class="flex flex-row justify-between items-center mb-4">
      <div class="flex justify-between items-center">

        <div class="">
          <button @click="toggleAdd" type="button"
            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Add Scholars</button>

            <button @click="toggleUpload" type="button"
            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Bulk Upload</button>
        </div>

      </div>

      <form class="w-3/12">
        <label for="default-search"
          class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="search" id="default-search"
            class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search Scholar" required />
          <button type="submit"
            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-0.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form>
    </div>

    <!-- table -->
    <div class="">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">URScholar ID</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Course</th>
              <th scope="col" class="px-6 py-3">Email</th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Expand</span>
              </th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Expand</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <template v-for="(scholar, index) in scholars" :key="scholar.id">
              <!-- Main Row -->
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ scholar.id }}
                </th>
                <td class="px-6 py-4">
                  {{ `${scholar.first_name} ${scholar.last_name}` }}
                </td>
                <td class="px-6 py-4">
                  {{ scholar.course }}
                </td>
                <td class="px-6 py-4">
                  {{ scholar.email }}
                </td>
                <td class="px-6 py-4">
                  <span
                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                      fill="currentColor" viewBox="0 0 20 20">
                      <path
                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                    </svg>
                    Pending
                  </span>
                </td>
                <td class="px-6 py-4 text-right">
                  <button>
                    <span class="material-symbols-rounded">
                      unfold_more
                    </span>
                  </button>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
    </div>
    <div class="mt-5 flex flex-col items-right">
      <!-- Help text -->
      <span class="text-sm text-gray-700 dark:text-gray-400">
        Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span
          class="font-semibold text-gray-900 dark:text-white">10</span> of <span
          class="font-semibold text-gray-900 dark:text-white">100</span> Scholars
      </span>
      <!-- Buttons -->
      <div class="inline-flex mt-2 xs:mt-0">
        <button
          class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-blue-800 rounded-s hover:bg-blue-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          Prev
        </button>
        <button
          class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-blue-800 border-0 border-s border-gray-700 rounded-e hover:bg-blue-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          Next
        </button>
      </div>
    </div>
  </div>

  <!-- Adding Panel -->
  <Transition name="slide">
    <div v-show="addingPanel" class="fixed inset-0 bg-dprimary bg-opacity-80 z-50 flex justify-end" @click.self="closePanel">
      <!-- Right side panel -->
      <div class="h-full overflow-y-auto bg-white dark:bg-gray-900 w-4/12 shadow-lg transition-transform duration-300" @click.stop>
        <div class="p-4 border-b flex justify-between items-center">
          <h2 class="text-xl font-semibold text-primary dark:text-dtext">Add Scholars</h2>
          <button @click="closePanel" class="p-2 text-primary dark:text-dtext hover:bg-gray-100 rounded-full transition-colors">
            <span class="material-symbols-rounded">close</span>
          </button>
        </div>

        <div class="p-10">
          <form @submit.prevent="addEntry">
            <div class="flex flex-col w-full gap-4">
              <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                <input v-model="formData.first_name" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
              </div>
              <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                <input v-model="formData.last_name" type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
              </div>
              <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input v-model="formData.email" type="email" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required />
              </div>
              <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
                <input v-model="formData.course" type="email" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required />
              </div>
            </div>
            <div class="mt-4 flex gap-2">
              <button type="button" @click="addEntry" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Add Scholar</button>
              <button type="button" @click="previewEntries" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Preview</button>
            </div>
          </form>
        </div>

        <!-- Preview Table -->
        <div class="p-5">
          <h3 class="text-lg font-semibold text-primary dark:text-dtext">Preview Added</h3>
          <div v-if="entries.length > 0" class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm mt-4">
            <table class="w-full text-black text-sm text-left">
              <thead>
                <tr>
                  <th v-for="header in addingheaders" :key="header" class="px-6 py-3">{{ header }}</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(entry, index) in entries" :key="index">
                  <td class="px-6 py-4">{{ entry.first_name }}</td>
                  <td class="px-6 py-4">{{ entry.last_name }}</td>
                  <td class="px-6 py-4">{{ entry.email }}</td>
                  <td class="px-6 py-4">{{ entry.course }}</td>
                  <td class="px-6 py-4">
                    <button @click="removeEntry(index)" class="text-red-600 hover:text-red-800 font-medium items-center justify-center">
                      <span class="material-symbols-rounded">
                      remove
                      </span>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <button @click="submitForm" class="btn mt-4 mb-4 mx-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
              Confirm & Submit
            </button>
          </div>
        </div>

      </div>
    </div>
  </Transition>


  <!-- Upload Panel -->
  <Transition name="slide">
    <div v-show="uploadingPanel" class="fixed inset-0 bg-dprimary bg-opacity-80 z-50 flex justify-end" @click.self="closePanel">
      <!-- Right side panel -->
      <div class="h-full overflow-y-auto bg-white dark:bg-gray-900 w-4/12 shadow-lg transition-transform duration-300" @click.stop>
        <div class="p-4 border-b flex justify-between items-center">
          <h2 class="text-xl font-semibold text-primary dark:text-dtext">Upload Scholars</h2>
          <button @click="closePanel" class="p-2 text-primary dark:text-dtext hover:bg-gray-100 rounded-full transition-colors">
            <span class="material-symbols-rounded">close</span>
          </button>
        </div>

        <!-- File Upload -->
        <div class="card">
          <FileUpload name="demo[]" @uploader="onUpload" :multiple="true" accept=".csv" :maxFileSize="1000000"
            customUpload @select="handleFileUpload" @clear="clearPreview" id="file-upload" class="bg-gray-900" />
        </div>

        <!-- Error Message -->
        <div v-if="error" class="text-red-500 mb-4">
          {{ error }}
        </div>

        <!-- Preview Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm mt-4">
          <table v-if="previewData.length > 0" class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th v-for="header in headers" :key="header" class="px-6 py-3">
                  {{ header }}
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(row, rowIndex) in previewData" :key="rowIndex" class="bg-white border-b hover:bg-gray-50">
                <td v-for="(header, colIndex) in headers" :key="colIndex" class="px-6 py-4 whitespace-nowrap">
                  {{ row[header] }}
                </td>
              </tr>
            </tbody>
          </table>

          <!-- Empty State -->
          <div v-if="previewData.length === 0 && !error" class="text-center py-4 text-gray-500">
            No data to display. Please upload a CSV file.
          </div>
        </div>
      </div>
    </div>
  </Transition>
  <!-- <ToastProvider>
      <ToastRoot 
          v-if="toastVisible" 
          class="fixed bottom-4 right-4 bg-primary text-white px-5 py-3 mb-5 mr-5 rounded-lg shadow-lg dark:bg-primary dark:text-dtext dark:border-gray-200 z-50 max-w-xs w-full"
      >
          <ToastTitle class="font-semibold dark:text-dtext">Scholars Added Successfully!</ToastTitle>
          <ToastDescription class="text-gray-100 dark:text-dtext">{{ toastMessage }}</ToastDescription>
      </ToastRoot>

      <ToastViewport class="fixed bottom-4 right-4" />
  </ToastProvider> -->


</template>

<script setup>
import {  ref, onBeforeMount, reactive , defineEmits, watchEffect } from 'vue';
import { useForm, Link, usePage } from '@inertiajs/vue3';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import FileUpload from 'primevue/fileupload';
import Papa from 'papaparse';
import { ToastAction, ToastDescription, ToastProvider, ToastRoot, ToastTitle, ToastViewport } from 'radix-vue'

const components = {
  DataTable,
  Column,
  Button,
  FileUpload,
  Papa,
};

const addingPanel = ref(false)
const uploadingPanel = ref(false)

const toggleAdd = () => {
  addingPanel.value = !addingPanel.value
}

const toggleUpload = () => {
  uploadingPanel.value = !uploadingPanel.value
}

const closePanel = () => {
  previewData.value = [];
  headers.value = [];
  document.getElementById('file-upload').value = null;
  uploadingPanel.value = false
  addingPanel.value = false
  addingPanel = ref(false)
  entries.value = false
}

const props = defineProps({
  scholarship: Object,
  scholars: Array,
});


const form = useForm({
  file: null,
});

const previewData = ref([]);
const headers = ref([]);
const error = ref('');

const handleFileUpload = (event) => {
  // eto ay para mafetch yung file
  const file = event.files[0];

  // eto naman ay para mafetch yung file as object
  if (event && event.files && event.files.length > 0) {
    const file = event.files[0]; // Get first file

    const reader = new FileReader();

    reader.onload = function (e) {
      Papa.parse(e.target.result, {
        header: true,
        complete: (results) => {
          if (results.data && results.data.length > 0) {
            // Filter out empty rows
            const filteredData = results.data.filter(row =>
              Object.values(row).some(value => value !== '')
            );

            if (filteredData.length > 0) {
              headers.value = Object.keys(filteredData[0]);
              previewData.value = filteredData;
              error.value = '';
              console.log('Processed data:', previewData.value); // Debug log
            } else {
              error.value = 'No valid data found in the file';
              previewData.value = [];
              headers.value = [];
            }
          } else {
            error.value = 'No data found in the file';
            previewData.value = [];
            headers.value = [];
          }
        },
        error: (err) => {
          error.value = 'Error parsing CSV: ' + err.message;
          previewData.value = [];
          headers.value = [];
        }
      });
    };
    reader.readAsText(file);
  }
};

const onUpload = async (event) => {
  form.file = event.files[0];6  
  const response = await form.post(`/scholarships/${props.scholarship.id}/upload`);

  if (response.ok) {
    headers.value = [];
    previewData.value = [];
    error.value = "";
    document.getElementById('file-upload').value = null; // Clear file input

    usePage().props.flash = { success: 'Scholars added to the scholarship!' };
    closePanel()
  } else {
    error.value = "Failed to upload file. Please try again.";
  }
}


//adding

const addingheaders = ["First Name", "Last Name", "Email", "Course"]

const formData = reactive({
  first_name: '',
  last_name: '',
  email: '',
  course: ''
})
const entries = ref([])

const addEntry = () => {
  if (formData.first_name && formData.last_name && formData.email && formData.course) {
    entries.value.push({ ...formData })
    resetForm()
  }
}

const resetForm = () => {
  formData.first_name = ''
  formData.last_name = ''
  formData.email = ''
  formData.course = ''
}

const removeEntry = (index) => {
  entries.value.splice(index, 1)
}


const submitForm = async () => {
  try {
    if (entries.value.length === 0) {
      alert('No data to submit!');
      return;
    }

    const response = await fetch('/api/insert-data', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(entries.value)
    });

    if (!response.ok) throw new Error('Failed to submit');

    // alert('Data submitted successfully!');

    // Clear entries after successful submission
    entries.value = [];
  } catch (error) {
    console.error('Error:', error);
  }
};


</script>


<style>
/* override the prime vue componentss */

.p-fileupload-choose-button {
  background-color: #003366 !important;
  color: white !important;
  border-radius: 4px;
}

.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease;
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(100%);
}

.slide-enter-to,
.slide-leave-from {
  transform: translateX(0);
}

/* Fade transition for backdrop */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>