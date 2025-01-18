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
                                <span>Scholarships</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="text-blue-400 font-semibold">{{ scholarship.name }} Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="w-full flex flex-row justify-between bg-white shadow-md p-5 rounded-xl mb-3">
                    <div class="w-9/12 flex justify-between items-">
                        <div>
                            <img class="w-36 h-36" :src="scholarship.logo" alt="logo" />
                        </div>
                        <div class="flex flex-col space-y-1">
                            <h1 class="text-4xl font-sora font-extrabold text-[darkblue] text-left">
                                <span>{{ scholarship.name }}</span> Scholars 2024-2025 ganyan
                            </h1>
                            <h1 class="text-lg font-quicksand font-semibold text-[darkblue] text-left">
                                Funded by Sponsor since Sponsor
                            </h1>
                            <h1 class="text-base font-quicksand font-normal text-[darkblue] text-left">
                                Lorem ipsum door sit amet. Ut sunt dolor ut corrupti facilis non excepturi nobis vel sapiente nemo aut rerum libero. Et odio sunt aut perspiciatis distinctio et tenetur esse et dolorum autem et veritatis officiis eos neque officiis qui voluptatem adipisci. Ea quia fuga qui accusantium minus et nisi voluptas sed amet suscipit sit cumque consequatur.
                            </h1>
                            <div class="avatar-group -space-x-3 rtl:space-x-reverse pt-1">
                                <div class="avatar">
                                    <div class="w-8">
                                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                    </div>
                                </div>
                                <div class="avatar">
                                    <div class="w-8">
                                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                    </div>
                                </div>
                                <div class="avatar">
                                    <div class="w-8">
                                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                    </div>
                                </div>
                                <div class="avatar placeholder">
                                    <div class="bg-neutral text-neutral-content w-8">
                                        <span class="text-xs">+99</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="w-2/12 flex flex-col justify-between items-center py-5">
                        <button 
                        type="button" 
                        @click="toggleScholars"
                        :class="['w-full py-2.5 px-5 me-2 mb-2 text-base font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700', 
                        { 'bg-blue-900 text-primary': activeTab === 'scholars' }]">
                        Scholars
                        </button>

                        <button 
                        type="button" 
                        @click="toggleReqs"
                        :class="['w-full py-2.5 px-5 me-2 mb-2 text-base font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700', 
                        { 'bg-blue-900 text-primary': activeTab === 'requirements' }]">
                        Requirements
                        </button>

                        <button 
                        type="button" 
                        @click="toggleMonitoring"
                        :class="['w-full py-2.5 px-5 me-2 mb-2 text-base font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700', 
                        { 'bg-blue-900 text-white': activeTab === 'monitoring' }]">
                        Monitoring
                        </button>
                    </div>
                </div>
                
                <div v-if="activeTab === 'scholars'">
                    <!-- <ScholarReqs /> -->
                    <ScholarsTab />
                </div>
                <div v-if="activeTab === 'requirements'">
                <ScholarReqs />
                </div>
                <!-- <div v-if="activeTab === 'monitoring'">
                <MonitoringTab />
                </div> -->
               
                <!-- <ScholarReqs /> -->
                <!-- <SlidingAddScholars /> -->
            </div>
            <!-- add here -->

        </div>
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

import ScholarsTab from '../../../Components/Admin/ScholarsTabs/ScholarsTab.vue';
import ScholarReqs from '../../../Components/Admin/ScholarsTabs/ScholarReqs.vue';

import SlidingAddScholars from '../../../Components/Admin/ScholarsTabs/SlidingAddScholars.vue';
import Test from '@/Components/Admin/ScholarsTabs/ScholarsTab 2.vue';

// components

const components = {
    DataTable,
    Column,
    Button,
    FileUpload,
    Papa,
    SlidingAddScholars,
};

// Reactive variables to track which tab is open
const activeTab = ref("scholars"); // Default to Scholars

// Functions to toggle the active tab
const toggleScholars = () => {
    activeTab.value = "scholars";
};

const toggleReqs = () => {
    activeTab.value = "requirements";
};

const toggleMonitoring = () => {
    activeTab.value = "monitoring";
};

const expandedRows = ref([]);

function expandAll() {
    expandedRows.value = products.value.reduce((acc, p) => (acc[p.id] = true) && acc, {});
}

function collapseAll() {
    expandedRows.value = null;
}

const toggleRow = (index) => {
    const position = this.expandedRows.indexOf(index)
    if (position !== -1) {
        this.expandedRows.splice(position, 1)
    } else {
        this.expandedRows.push(index)
    }
}

// testing

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