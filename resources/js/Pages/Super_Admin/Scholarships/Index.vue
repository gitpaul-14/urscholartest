<template>

    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <div class="w-full h-full px-10 py-5 bg-[#F8F8FA] dark:bg-dprimary overflow-auto">
            <div class="w-full mx-auto p-3 rounded-xl text-white">
                <div class="breadcrumbs text-sm text-gray-400 mb-5">
                    <ul>
                        <li class="hover:text-gray-600">
                            Home
                        </li>
                        <li>
                            <span class="text-blue-400 font-semibold dark:text-gray-300">View Sponsors</span>
                        </li>
                    </ul>
                </div>

                <div class="flex justify-between items-center mb-4">
                    <h1
                        class="text-4xl font-albert font-extrabold text-[darkblue] dark:text-dtext text-left">
                        URS Partnered Sponsors</h1>

                    <button class="btn shadow-md bg-white border dark:border-gray-600 dark:bg-dprimary dark:text-dtext dark:hover:bg-primary" @click="toggleCreate">
                        <span class="material-symbols-rounded dark:text-dtext">
                            library_add
                        </span>
                        New Sponsor
                    </button>
                </div>

                <!-- List of Scholarships -->
                <div v-if="!Showcase">
                    <div class="container mx-auto py-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div v-for="sponsor in sponsors" :key="sponsor.id"
                                class="card border bg-white hover:shadow-xl hover:border-gray-400 dark:bg-dcontainer dark:border-gray-600 dark:hover:border-gray-400">
                                <div class="card-body p-5 space-y-2">
                                    <!-- logo -->
                                    <div>
                                        <img :src="`/storage/sponsor/logo/${sponsor.logo}`" alt="logo" class="w-20 h-20 rounded-full" />
                                    </div>
                                    <h2 class="card-title text-4xl text-gray-800 font-sora font-semibold dark:text-dtext">{{
                                        sponsor.name }}</h2>
                                    <p class="leading-relaxed text-sm text-gray-400">
                                        <span class="px-2 border rounded-xl border-gray-200 dark:border-gray-600">Created on: {{ new Date(sponsor.created_at).toLocaleDateString() }}</span><br>
                                        <span class="px-2 border rounded-xl border-gray-200 dark:border-gray-600">Sponsoring Since: {{ new Date(sponsor.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</span>
                                    </p>
                                    <!-- <div class="badge badge-primary text-[12px] badge-outline">DEPED</div> -->
                                    <p class="text-md text-gray-600 dark:text-dtext mb-4 text-justify overflow-hidden text-overflow-truncate line-clamp-4 h-24 max-w-full"
                                        style=" display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ sponsor.description }}
                                    </p>
                                    <!-- <div class="card-actions justify-end">
                                        <Link :href="`/scholarships/${scholarship.id}`" class="btn btn-primary btn-sm">
                                        View</Link>
                                    </div>
                                    <div class="card-actions justify-end">
                                        <Link :href="`/scholarships/${scholarship.id}/applicants`" class="btn btn-primary btn-sm">
                                            Applicants</Link>
                                    </div>
                                    <button @click="editScholarship(scholarship)"
                                        class="btn btn-warning btn-sm">Edit</button> -->
                                    <div class="flex justify-end space-x-4">
                                        <Link :href="`/sponsors/${sponsor.id}`">
                                        <div class="text-sm text-gray-500 cursor-pointer">
                                            <span
                                                class="material-symbols-rounded text-blue-900 dark:text-dtext bg-blue-100 hover:bg-gray-200 p-3 border rounded-lg dark:bg-dsecondary dark:border-gray-600 dark:hover:border-gray-300 dark:hover:bg-dsecondary">
                                                open_in_browser
                                            </span>
                                        </div>
                                        </Link >
                                        <div class="text-sm text-gray-500">
                                            <span
                                                class="material-symbols-rounded text-blue-900 dark:text-dtext bg-blue-100 hover:bg-gray-200 p-3 border rounded-lg dark:bg-dsecondary dark:border-gray-600 dark:hover:border-gray-300 dark:hover:bg-dsecondary">
                                                cancel
                                            </span>
                                        </div>
                                        <div class="text-sm text-gray-500 cursor-pointer"
                                            @click="editScholarship(scholarship)" type="button">
                                            <span
                                                class="material-symbols-rounded text-blue-900 dark:text-dtext bg-blue-100 hover:bg-gray-200 p-3 border rounded-lg dark:bg-dsecondary dark:border-gray-600 dark:hover:border-gray-300 dark:hover:bg-dsecondary">
                                                settings
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- creating a sponsor -->
            <div v-if="isCreating || isEditing"
                class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 dark:bg-primary dark:bg-opacity-50 transition-opacity-ease-in duration-300 ">
                <div class="bg-white dark:bg-gray-900 dark:border-gray-200 rounded-lg shadow-xl w-4/12">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <span class="text-xl font-semibold text-gray-900 dark:text-white">
                            <h2 class="text-2xl font-bold">{{ isEditing ? 'Edit Sponsor Information' : 'Add New Sponsor'
                                }}</h2>
                        </span>
                        <button type="button" @click="closeModal"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                
                    <form @submit.prevent="submitForm" class="space-y-4 p-4">
                        <div class="space-y-3">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Sponsor</h3>
                            <input v-model="form.name" type="text" id="name"
                                placeholder="Enter a Partnership or Sponsor"
                                class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 text-gray-900 text-sm w-full dark:bg-gray-900 dark:text-dtext" />
                        </div>
                        <!-- file input -->
                        <div class="w-full h-full flex flex-col space-y-3">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Attach Memorandum of Agreement</h3>
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
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
                                    <img :src="form.filePreview" alt="Uploaded Preview" class="max-h-24 mb-2 rounded-lg" />
                                    <p class="text-sm text-gray-500">{{ form.fileName }}</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" accept=".svg, .png, .jpg, .docx"
                                    @change="(e) => handleFile(e.target.files[0])" />
                            </label>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Sponsor Background Information</h3>
                            <textarea v-model="form.description" id="description" placeholder="Enter Description"
                                class="textarea textarea-bordered bg-gray-50 w-full border-gray-300 dark:bg-gray-900 dark:text-dtext"></textarea>
                        </div>
                        <!-- photo input -->
                        <div class="w-full h-full flex flex-col">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Upload Photo (Optional for
                                Displaying)</h3>
                                <label for="dropzone-img"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
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
                        <button type="submit" class="text-white font-sans w-full bg-gradient-to-r from-blue-700 via-blue-800 to-blue-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-900/90 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                            {{ isEditing ? 'Update Scholarship' : 'Create Scholarship' }}</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <ToastProvider>
            <ToastRoot 
                v-if="toastVisible" 
                class="fixed bottom-4 right-4 bg-primary text-white px-5 py-3 mb-5 mr-5 rounded-lg shadow-lg dark:bg-primary dark:text-dtext dark:border-gray-200 z-50 max-w-xs w-full"
            >
                <ToastTitle class="font-semibold dark:text-dtext">Sponsor Added Successfully!</ToastTitle>
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
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import { Tooltip } from 'primevue';
import { DatePicker } from 'primevue';
import { ToastAction, ToastDescription, ToastProvider, ToastRoot, ToastTitle, ToastViewport } from 'radix-vue'


defineProps({
    sponsors: Array,
});

const directives = {
    Tooltip,
    DatePicker,
};

const isCreating = ref(false);
const isEditing = ref(false);
const Showcase = ref(false);

const form = ref({
    id: null,
    name: null,
    description: null,
    file: null,
    fileName: null,
    filePreview: null,
    img: null,
    imgName: null,
    imgPreview: null,
});

const scholarships = ref({
    name: null,
    scholarshipType: null,
    school_year: null,
    semester: null,
    application: null,
    deadline: null,
});

const isFileDragging = ref(false);
const isImgDragging = ref(false);

const previewFile = (event) => {
    const file = event.target.files[0];
    handleFile(file);
};

const previewImg = (event) => {
    const img = event.target.files[0];
    handleImg(img);
};

const handleFileDragOver = () => {
    isFileDragging.value = true;
};

const handleImgDragOver = () => {
    isImgDragging.value = true;
};

const handleFileDragLeave = () => {
    isFileDragging.value = false;
};

const handleImgDragLeave = () => {
    isImgDragging.value = false;
};

const handleFileDrop = (event) => {
    isFileDragging.value = false;
    const file = event.dataTransfer.files[0];
    handleFile(file);
};

const handleImgDrop = (event) => {
    isImgDragging.value = false;
    const img = event.dataTransfer.files[0];
    handleImg(img);
};

const handleFile = (file) => {
    if (file) {
        form.value.file = file;
        form.value.fileName = file.name;
        const reader = new FileReader();
        reader.onload = (e) => {
            form.value.filePreview = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

// if (file.size > 4 * 1024 * 1024) { // 4MB limit
    // alert("File size exceeds the 4MB limit.");
    // return;
    // }
const handleImg = (img) => {
    if (img) {
        // Generate a unique filename using timestamp
        const timestamp = new Date().getTime();
        const uniqueFileName = `${timestamp}_${img.name}`;
        
        form.value.img = img;
        form.value.imgName = uniqueFileName; // Store the generated unique filename
        
        // Create preview
        const reader = new FileReader();
        reader.onload = (e) => {
            form.value.imgPreview = e.target.result;
        };
        reader.readAsDataURL(img);
    }
};

const toggleCreate = () => {
    isCreating.value = !isCreating.value;
    if (isCreating.value) {
        resetForm();
    }
};

const closeModal = () => {
    isCreating.value = false;
    isEditing.value = false;
    isPublishing.value = false;
    resetForm();
};

const resetForm = () => {
    form.value = { id: null, name: '', description: '' };
};

const editScholarship = (scholarship) => {
    isEditing.value = true;
    isCreating.value = false;
    form.value = { ...scholarship };
};

const viewApplicants = (scholarshipId) => {
    Inertia.visit(`/scholarships/${scholarshipId}/applicants`);
};


const submitForm = async () => {
    try {
        if (isEditing.value) {
            router.put(`/sponsors/${form.value.id}`, form.value);
        } else {
            router.post("/sponsors", form.value);
        }

        closeModal();
    } catch (error) {
        console.error("Error submitting form:", error);
    }
};

const activeateForm = async () => {
    try {
        await useForm(scholarships.value).post(route('scholarships.store'));
        closeModal();
    } catch (error) {
        console.error('Error submitting form:', error);
    }
};



// radix vue testing

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

// onMounted(() => {
//     setTimeout(() => {
//         toastMessage.value = "Test Toast!";
//         toastVisible.value = true;

//         setTimeout(() => {
//             toastVisible.value = false;
//         }, 30000);
//     }, 1000);
// });

</script>

<style scoped>
.p-tooltip-text {
    margin-left: 0px;
    font-size: 13px !important;
}

.test {
    z-index: 9999;
}
</style>