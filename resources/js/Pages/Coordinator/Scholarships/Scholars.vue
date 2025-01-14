<template>
  <AuthenticatedLayout>
    <div class="w-full h-full px-10 py-5 bg-[#F8F8FA] overflow-x-auto">
      <div class="w-full mx-auto p-3 rounded-xl text-white overflow-x-auto">
          <div class="breadcrumbs text-sm text-gray-400 mb-5">
            <ul>
              <li>
              <a>
                  <span class="material-symbols-rounded mr-2" style="color: #0D47A1; font-size: 20px;">
                  dashboard
                  </span>
                  Home
              </a>
              </li>
              <li>
              <a>
                  <span>Ongoing Scholarships</span>
              </a>
              </li>
              <li>
              <a>
                  <span class="text-blue-400 font-semibold">List of Scholars</span>
              </a>
              </li>
            </ul>
          </div>
          <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-poppins font-extrabold text-[darkblue] text-left underline underline-offset-4">
              <span>{{ scholarship.name }}</span> Scholars</h1>

            <button class="btn" @click="toggleCreate" >
                <span class="material-symbols-rounded">
                library_add
                </span>
                Add Scholars
            </button>
        </div>
        
      
      </div>
      <DataTable v-model:expandedRows="expandedRows" dataKey="id" 
      :value="scholars" tableStyle="min-width: 60rem">
        <!-- <template #header>
          <div class="flex justify-between w-full mb-4">
            <div class="flex flex-wrap gap-2">
              <Button text icon="pi pi-plus" label="Expand All" @click="expandAll" />
              <Button text icon="pi pi-minus" label="Collapse All" @click="collapseAll" />
            </div>
          </div>
        </template> -->
        <Column expander style="width: 5rem" />
        <!-- <Column field="id" header="#" :sortable="true">
              <template #body="slotProps">
                {{ slotProps.rowIndex + 1 }}
              </template>
            </Column> -->
            <Column field="id" header="Scholar ID" :sortable="true" />
            <Column field="first_name" header="First Name" :sortable="true" />
            <Column field="last_name" header="Last Name" :sortable="true" />
            <Column field="email" header="Email" :sortable="true" />
            <Column field="course" header="Course" :sortable="true" />
            <template #expansion="slotProps">
                <div class="p-2">
                    <!-- <h5>Requirements {{ slotProps.data.name }}</h5> -->
                    <DataTable :value="slotProps.data.orders">
                        <Column field="id" header="Requirements" sortable></Column>
                        <Column headerStyle="width:4rem">
                            <template #body>
                              <span class="material-symbols-rounded text-black">
                              open_in_full
                              </span>
                            </template>
                        </Column>
                    </DataTable>
                </div>
            </template>

            <!-- <template #expansion="slotProps">
              <div class="p-4">
                <h5 class="text-lg font-bold mb-4">Requirements: {{ slotProps.data.name }}</h5>
                <DataTable :value="slotProps.data.orders" class="w-full flex flex-col">
                  <Column field="id" header="National ID" sortable>
                  </Column>
                  <Column field="pagibig" header="Pag Ibig" sortable>
                  </Column>
                  <Column headerStyle="width:4rem">
                    <template #body>
                      <div class="flex justify-center items-center">
                        <span class="material-symbols-rounded text-black cursor-pointer">
                          open_in_full
                        </span>
                      </div>
                    </template>
                  </Column>
                </DataTable>
              </div>
            </template> -->



            <!-- <Column field="customer" header="Customer" sortable></Column>
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
                        </Column>-->
      </DataTable>


      <!-- <div class="card"> -->
        <!-- <ToggleButton v-model="balanceFrozen" onIcon="pi pi-lock" offIcon="pi pi-lock-open" onLabel="Balance" offLabel="Balance" /> -->

        <!-- <DataTable :value="scholars" dataKey="id"  scrollable scrollHeight="400px" class="mt-6">
            <Column field="last_name" header="Name" style="min-width: 200px" frozen class="font-bold"></Column>
            <Column field="first_name" header="FN" style="min-width: 100px"></Column>
            <Column field="email" header="Email" style="min-width: 200px"></Column>
            <Column field="course" header="Course" style="min-width: 200px"></Column>
            <Column field="activity" header="Activity" style="min-width: 200px"></Column>
            <Column field="representative.name" header="Representative" style="min-width: 200px"></Column> -->
            <!-- <Column field="balance" header="Balance" style="min-width: 200px" alignFrozen="right" :frozen="balanceFrozen">
                <template #body="{ data }">
                    <span class="font-bold">{{ formatCurrency(data.balance) }}</span>
                </template>
            </Column> -->
        <!-- </DataTable>
    </div> -->


      <div class="flex flex-col items-center">
        <!-- Help text -->
        <span class="text-sm text-gray-700 dark:text-gray-400">
            Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span class="font-semibold text-gray-900 dark:text-white">10</span> of <span class="font-semibold text-gray-900 dark:text-white">100</span> Entries
        </span>
        <!-- Buttons -->
        <div class="inline-flex mt-2 xs:mt-0">
            <button class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Prev
            </button>
            <button class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
            </button>
        </div>
      </div>
    </div>

    
    <!-- Right side panel with transition -->
    <Transition name="slide">
      <div v-show="showPanel" 
          class="h-full overflow-y-auto z-50 bg-white w-3/12 fixed right-0 top-0 shadow-lg transition-transform duration-300">
          <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-xl font-semibold">Add Scholars</h2>
            <button 
              @click="closePanel"
              class="p-2 hover:bg-gray-100 rounded-full transition-colors"
            >
              <span class="material-symbols-rounded">close</span>
            </button>
          </div>
          <!-- <form @submit.prevent="uploadCSV"> -->
            <div class="card">
              <FileUpload 
                name="demo[]" 
                @uploader="onUpload" 
                :multiple="true" 
                accept=".csv" 
                :maxFileSize="1000000"
                customUpload 
                @select="handleFileUpload"
                @clear="clearPreview"
                id="file-upload"
              />
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
                    <th
                      v-for="header in headers"
                      :key="header"
                      class="px-6 py-3"
                    >
                      {{ header }}
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(row, rowIndex) in previewData"
                    :key="rowIndex"
                    class="bg-white border-b hover:bg-gray-50"
                  >
                    <td
                      v-for="(header, colIndex) in headers"
                      :key="colIndex"
                      class="px-6 py-4 whitespace-nowrap"
                    >
                      {{ row[header] }}
                    </td>
                  </tr>
                </tbody>
              </table>

              <!-- Empty State -->
              <div
                v-if="previewData.length === 0 && !error"
                class="text-center py-4 text-gray-500"
              >
                No data to display. Please upload a CSV file.
              </div>
            </div>
          <!-- </form> -->
      </div>
    </Transition>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps, ref, onBeforeMount, reactive } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import FileUpload from 'primevue/fileupload';
import Papa from 'papaparse';

const components = {
  DataTable,
  Column,
  Button,
  FileUpload,
  Papa,
};

const expandedRows = ref([]);

function expandAll() {
    expandedRows.value = products.value.reduce((acc, p) => (acc[p.id] = true) && acc, {});
}

function collapseAll() {
    expandedRows.value = null;
}

const showPanel = ref(false)

const toggleCreate = () => {
  showPanel.value = !showPanel.value
}

const closePanel = () => {
  previewData.value = [];
    headers.value = [];
    document.getElementById('file-upload').value = null;
  showPanel.value = false
  
}

const props = defineProps({
  scholarship: Object,
  scholars: Array
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
    
    reader.onload = function(e) {
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

const clearPreview = () => {
    previewData.value = [];
    headers.value = [];
  };

const onUpload = async (event) => {
  form.file = event.files[0];

  const response = await form.post(`/scholarships/${props.scholarship.id}/upload`);

  if (response.ok) {
    headers.value = [];
    previewData.value = [];
    error.value = "";
    document.getElementById('file-upload').value = null; // Clear file input
    // Optionally, you can also refresh the scholars list here if needed
    // For example, you can emit an event or call a method to fetch the updated list
  } else {
    error.value = "Failed to upload file. Please try again.";
  }
}

// toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
  // form.post(`/scholarships/${props.scholarship.id}/upload`, {
  //   preserveScroll: true,
  // });

  // if (response.ok) {
  //         headers.value = [];
  //         previewData.value = [];
  //         error.value = "";
  //         alert("Data inserted successfully!");
  //       } else {
  //         const errorResponse = await response.json();
  //         error.value = errorResponse.message || "Failed to insert data. Please try again.";
  //       }

const uploadCSV = () => {
  form.post(`/scholarships/${props.scholarship.id}/upload`, {
    preserveScroll: true,
  });
};

// const preview = () => {
//   document.getElementById('file-upload').addEventListener('change', function(event) {
//     const file = event.target.files[0];
//     if (file) {
//       Papa.parse(file, {
//         header: true,
//         complete: function(results) {
//           console.log(results.data);
//         }
//       });
//     }
//   });

//   function renderCSV(data) {
//     const table = document.getElementById('csvPreview');
//     table.innerHTML = '';

//     if(data.length > 0) {
//       const headers = Object.keys(data[0]);
//       const headerRow = document.createElement('tr');
//       headers.forEach(header => {
//         const th = document.createElement('th');
//         th.textContent = header;
//         headerRow.appendChild(th);
//       });
//       table.appendChild(headerRow);

//       data.forEach(row => {
//         const tr = document.createElement('tr');
//         headers.forEach(header => {
//           const td = document.createElement('td');
//           td.textContent = row[header];
//           tr.appendChild(td);
//         });
//         table.appendChild(tr);
//       });
//     }
//     else {
//       table.innerHTML = '<tr><td>No data to display</td></tr>';
//     }
//   }
// };


// const handleFileUpload = (event) => {
//   const file = event.target.files[0];
//   if (file) {
//     Papa.parse(file, {
//       header: true,
//       complete: (results) => {
//         if (results.data && results.data.length > 0) {
//           headers.value = Object.keys(results.data[0]);
//           previewData.value = results.data;
//           error.value = '';
//         } else {
//           error.value = 'No data found in the file';
//           previewData.value = [];
//           headers.value = [];
//         }
//       },
//     });
//   }
// };

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