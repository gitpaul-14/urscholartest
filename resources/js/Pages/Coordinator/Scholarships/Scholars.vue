<template>
  <AuthenticatedLayout>


    <!-- <div class="flex flex-col items-center min-h-screen bg-gray-100">
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
  </div> -->


    <!-- <div class="w-full h-full px-10 py-5 bg-[#F8F8FA]">
      <div class="font-semibold text-xl mb-4"><span>{{ scholarship.name }} </span> Scholars</div>
      <DataTable v-model:expandedRows="expandedRows" :value="scholars" dataKey="id" tableStyle="min-width: 60rem">
        <template #header>
          <div class="flex justify-between w-full mb-4">
            <div class="flex flex-wrap gap-2">
              <Button text icon="pi pi-plus" label="Expand All" @click="expandAll" />
              <Button text icon="pi pi-minus" label="Collapse All" @click="collapseAll" />
            </div>
            <form @submit.prevent="uploadCSV">
              <div class="card">
                <FileUpload name="demo[]" @uploader="onUpload" :multiple="true" accept=".csv" :maxFileSize="1000000"
                  customUpload @change="handleFileUpload" />
              </div>
            </form>
          </div>
        </template>
        <Column expander style="width: 5rem" />
        <Column field="id" header="#" :sortable="true">
              <template #body="slotProps">
                {{ slotProps.rowIndex + 1 }}
              </template>
            </Column>
            <Column field="first_name" header="First Name" :sortable="true" />
            <Column field="last_name" header="Last Name" :sortable="true" />
            <Column field="email" header="Email" :sortable="true" />
            <Column field="course" header="Course" :sortable="true" />
        <template #expansion="slotProps">
          <div class="p-4">
            <h5>Orders for {{ slotProps.data.name }}</h5>
            <DataTable :value="slotProps.data.orders">
              <Column field="id" header="Id" sortable></Column>
              <Column field="customer" header="Customer" sortable></Column>
              <Column field="date" header="Date" sortable></Column>
              <Column field="amount" header="Amount" sortable>
                <template #body="slotProps">
                  {{ formatCurrency(slotProps.data.amount) }}
                </template>
              </Column>
              <Column field="status" header="Status" sortable>
                <template #body="slotProps">
                  <Tag :value="slotProps.data.status.toLowerCase()" :severity="getOrderSeverity(slotProps.data)" />
                </template>
              </Column>
              <Column headerStyle="width:4rem">
                <template #body>
                  <Button icon="pi pi-search" />
                </template>
              </Column>
            </DataTable>
          </div>
        </template>
      </DataTable>
    </div> -->

    <div class="w-full h-full px-10 py-5 bg-[#F8F8FA]">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-poppins font-extrabold text-[darkblue] text-left underline underline-offset-4">
          <span>{{ scholarship.name }}</span> Scholars
        </h1>
        <button class="btn" @click="toggleCreate">
          <span class="material-symbols-rounded">library_add</span>
          Add Scholars
        </button>
      </div>
    </div>
    <!-- Right side panel with transition -->
    <Transition name="slide">
      <div v-show="showPanel" 
          class="h-full overflow-y-auto bg-white w-3/12 fixed right-0 top-0 shadow-lg transition-transform duration-300">
          <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-xl font-semibold">Add Scholars</h2>
            <button 
              @click="closePanel"
              class="p-2 hover:bg-gray-100 rounded-full transition-colors"
            >
              <span class="material-symbols-rounded">close</span>
            </button>
          </div>
        <form @submit.prevent="uploadCSV">
          <div class="card">
            <FileUpload 
              name="demo[]" 
              @uploader="onUpload" 
              :multiple="true" 
              accept=".csv" 
              :maxFileSize="1000000"
              customUpload 
              @change="handleFileUpload" 
            />
          </div>
        </form>
      </div>
    </Transition>

  </AuthenticatedLayout>
</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps, ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import FileUpload from 'primevue/fileupload';

const components = {
  DataTable,
  Column,
  Button,
  FileUpload,
};

const showPanel = ref(false)

const toggleCreate = () => {
  showPanel.value = !showPanel.value
}

const closePanel = () => {
  showPanel.value = false
}

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


const onUpload = (event) => {
  form.file = event.files[0];

  // toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
  form.post(`/scholarships/${props.scholarship.id}/upload`, {
    preserveScroll: true,
  });
}

const uploadCSV = () => {
  form.post(`/scholarships/${props.scholarship.id}/upload`, {
    preserveScroll: true,
  });
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