<template>

    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <div class="w-full h-full px-10 py-5 bg-[#F8F8FA] dark:bg-dprimary overflow-auto">
            <form @submit.prevent="submitForm">
                <div class="w-full mx-auto p-3 rounded-xl text-white">
                    <div class="flex flex-row justify-between">
                        <div class="breadcrumbs text-sm text-gray-400 mb-5">
                            <ul>
                                <li class="hover:text-gray-600">
                                        Home
                                </li>
                                <li class="hover:text-gray-600">
                                        <Link :href="route('sponsor.index')">
                                            <span class="font-normal">View Sponsors</span>
                                        </Link>
                                        
                                </li>
                                <li>
                                    <span class="text-blue-400 font-semibold dark:text-gray-300">Create Scholarships</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mr-20">
                            <button class="btn shadow-md bg-white border dark:border-gray-600 dark:bg-dprimary dark:text-dtext dark:hover:bg-primary" type="submit">
                                <span class="material-symbols-rounded dark:text-dtext">
                                stylus
                                </span>
                                Create
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full h-full space-y-5 px-24 mb-3">
                    <!-- partnership content -->
                    <div class="w-full h-[30%] flex flex-row px-10 py-5 bg-white shadow-md rounded-lg dark:bg-dsecondary dark:border-gray-200 dark:border">
                        <div>
                            <img :src="`/storage/sponsor/logo/${sponsor.logo}`" alt="logo" class="w-20 h-20 rounded-full" />
                        </div>
                        <h2 class="text-xl font-semibold text-primary font-quicksand dark:text-dtext">
                            {{ sponsor.name }}
                        </h2>
                        <h2 class="text-xl font-semibold text-primary font-quicksand dark:text-dtext">
                            Commission on Higher Education
                        </h2>
                    </div>

                    <!-- creating -->
                    <div class="w-full inline-block bg-white shadow-md rounded-lg dark:bg-dsecondary dark:border dark:border-gray-200">
                        <div class="w-full bg-blue-900 dark:bg-primary h-8 flex items-center justify-center rounded-t-lg">
                            <h2 class="text-base font-semibold text-white font-quicksand">Scholarship Information
                            </h2>
                        </div>
                        <div class="flex flex-col gap-2 px-10 py-5">
                            <!-- <div class="h-full w-full flex flex-row gap-3">
                                <div class="w-full">
                                    <div class="relative">
                                        <div class="flex flex-row gap-3 w-full mb-3">
                                            <div class="w-full flex flex-col space-y-2">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Scholarship
                                                    Name</h3>
                                                <input v-model="form.name" type="text" id="name"
                                                    placeholder="Enter Scholarship Name"
                                                    class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 text-gray-900 text-sm w-full dark:text-dtext dark:border dark:bg-dsecondary dark:border-gray-600" />
                                            </div>
                                            <div class="w-full flex flex-col space-y-2">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Scholarship
                                                    Type</h3>
                                                <select v-model="form.scholarshipType" id="scholarshipType"
                                                    class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 text-gray-900 text-sm w-full dark:text-dtext dark:border dark:bg-dsecondary dark:border-gray-600">
                                                    <option value="" disabled>Select Scholarship Type</option>
                                                    <option value="merit">Merit-based</option>
                                                    <option value="need">Need-based</option>
                                                    <option value="athletic">Athletic</option>
                                                    <option value="artistic">Artistic</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-full w-full flex flex-row gap-3">
                                <div class="w-full">
                                    <div class="flex flex-row gap-3 w-full mb-3">
                                        <div class="w-full flex flex-col space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">School Year</h3>
                                            <input v-model="form.school_year" type="text" id="name"
                                                placeholder="School Year"
                                                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 text-gray-900 text-sm w-full dark:text-dtext dark:border dark:bg-dsecondary dark:border-gray-600" />
                                        </div>
                                        <div class="w-full flex flex-col space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Semester</h3>
                                            <select v-model="form.semester" id="scholarshipType"
                                                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 text-gray-900 text-sm w-full dark:text-dtext dark:border dark:bg-dsecondary dark:border-gray-600">
                                                <option value="" disabled>Select Semester</option>
                                                <option value="merit">First Semester</option>
                                                <option value="need">Second Semester</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-span-1">
                                <div class="flex flex-col w-full gap-2">
                                    <div class="w-full">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Sponsor</h3>
                                        <input v-model="form.name" type="text" id="name"
                                            placeholder="Enter a Partnership or Sponsor"
                                            class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 text-gray-900 text-sm w-full dark:bg-gray-900 dark:text-dtext" />
                                    </div>
                                    <div class="w-full flex flex-row gap-2">
                                            <div class="w-full">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Abbreviation</h3>
                                                <input type="text" id="name"
                                                    placeholder="e.g., CHED"
                                                    class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 text-gray-900 text-sm w-full dark:bg-gray-900 dark:text-dtext" />
                                            </div>
                                            <div class="w-full">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Partner Since</h3>
                                                <input type="text" id="name"
                                                    placeholder="e.g., Since 2012"
                                                    class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 text-gray-900 text-sm w-full dark:bg-gray-900 dark:text-dtext" />
                                            </div>
                                    </div>

                                    <div class="w-full h-full flex flex-col">
                                        <h3 class="font-semibold text-gray-900 dark:text-white mb-1">Attach Memorandum of Agreement</h3>
                                        <label for="dropzone-file"
                                            class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                            :class="{ 'border-blue-500 bg-blue-50': isDragging }"
                                            @dragover.prevent="handleFileDragOver" @dragleave="handleFileDragLeave"
                                            @drop.prevent="handleFileDrop">
                                            <div v-if="!form.file" class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                    <span class="font-semibold">Click to upload</span> or drag and drop
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, DOCX (MAX. 2MB-4MB)</p>
                                            </div>
                                            <div v-else class="flex flex-col items-center justify-center">
                                                <img :src="form.filePreview" alt="Uploaded Preview" class="h-32 mb-2 rounded-lg" />
                                                <p class="text-sm text-gray-500">{{ form.fileName }}</p>
                                            </div>
                                            <input id="dropzone-file" type="file" class="hidden" accept=".svg, .png, .jpg, .docx"
                                                @change="(e) => handleFile(e.target.files[0])" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="flex flex-col w-full gap-2">
                                    <div class="h-full">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Sponsor Background Information</h3>
                                        <textarea v-model="form.description" id="description" placeholder="Enter Description"
                                            class="textarea textarea-bordered h-28 bg-gray-50 w-full border-gray-300 dark:bg-gray-900 dark:text-dtext"></textarea>
                                    </div>

                                    <div class="w-full h-full flex flex-col">
                                        <h3 class="font-semibold text-gray-900 dark:text-white mb-1">Upload Photo (Optional for
                                            Displaying)</h3>
                                            <label for="dropzone-img"
                                                class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                                :class="{ 'border-blue-500 bg-blue-50': isDragging }"
                                                @dragover.prevent="handleImgDragOver" @dragleave="handleImgDragLeave"
                                                @drop.prevent="handleImgDrop">
                                                <div v-if="!form.img" class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Click to upload</span> or drag and drop
                                                    </p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px - 2MB-4MB)</p>
                                                </div>
                                                <div v-else class="flex flex-col items-center justify-center">
                                                    <img :src="form.imgPreview" alt="Uploaded Preview" class="max-h-24 mb-2 rounded-lg" />
                                                    <p class="text-sm text-gray-500">{{ form.imgName }}</p>
                                                </div>
                                                <input id="dropzone-img" type="file" class="hidden" accept=".svg, .png, .jpg, .jpeg"
                                                    @change="(e) => handleImg(e.target.files[0])" />
                                            </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <ToastProvider>
            <ToastRoot 
                v-if="toastVisible" 
                class="fixed bottom-4 right-4 bg-primary text-white px-5 py-3 mb-5 mr-5 rounded-lg shadow-lg dark:bg-primary dark:text-dtext dark:border-gray-200 z-50 max-w-xs w-full"
            >
                <ToastTitle class="font-semibold dark:text-dtext">Scholarship created successfully!</ToastTitle>
                <ToastDescription class="text-gray-100 dark:text-dtext">{{ toastMessage }}</ToastDescription>
            </ToastRoot>

            <ToastViewport class="fixed bottom-4 right-4" />
        </ToastProvider>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted, watchEffect } from 'vue';
import { usePage } from "@inertiajs/vue3";
import { Head, useForm, Link, } from '@inertiajs/vue3';
import { Tooltip } from 'primevue';
import { set } from 'date-fns';
import { DatePicker } from 'primevue';
import { ToastAction, ToastDescription, ToastProvider, ToastRoot, ToastTitle, ToastViewport } from 'radix-vue'


const props = defineProps({
    sponsor: Object,
    scholarship: Array,
});

const directives = {
    Tooltip,
    DatePicker,
};


const form = ref({
    name: null,
    sponsor_id: props.sponsor.id,
    scholarshipType: null,
    school_year: null,
    semester: null,
    application: null,
    deadline: null,
    requirements: {},
});




const resetForm = () => {
    form.value = { id: null, name: '', description: '' };
};


const submitForm = async () => {
    try {
        await useForm(form.value).post(`/sponsors/${props.sponsor.id}/create`);
        // await form.post(`/sponsors/${props.sponsor.id}/create`)
        // resetForm();
    } catch (error) {
        console.error('Error submitting form:', error);
    }
};

const isPublishing = ref(false);

const toggleSetActive = () => {
    isPublishing.value = !isPublishing.value;
    currentPage.value = 1;
    if (isPublishing.value) {
        resetForm();
    }
};

// dynamic requirements
const newItem = ref('');
const items = ref([]);

const addItem = () => {
    if (newItem.value.trim() !== '') {
        items.value.push(newItem.value.trim());
        form.value.requirements = items.value;
        newItem.value = '';

        
    }
};


const addRequirement = () => {
  if (newRequirement.value.name.trim()) {
    form.requirements[newRequirement.value.name.trim()] = {
      type: newRequirement.value.type,
      required: true
    };
    newRequirement.value.name = '';
  }
};

const removeItem = (index) => {
    items.value = items.value.filter((_, i) => i !== index);
};

const currentPage = ref(1);

const nextPage = () => {
    if (currentPage.value < 3) {
        currentPage.value++;
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};

const toastVisible = ref(false);
const toastMessage = ref("");

watchEffect(() => {
    const flashMessage = usePage().props.flash?.success;
    
    if (flashMessage) {
        console.log("Showing toast with message:", flashMessage);
        toastMessage.value = flashMessage;
        toastVisible.value = true;

        setTimeout(() => {
            console.log("Hiding toast...");
            toastVisible.value = false;
        }, 3000);
    }
});

</script>


<style scoped>
.p-tooltip-text {
    margin-left: 0px;
    font-size: 13px !important;
}
</style>