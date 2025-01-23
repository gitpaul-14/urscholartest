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
                            <button class="btn shadow-md dark:border-gray-600 dark:bg-dprimary dark:text-dtext dark:hover:bg-primary" type="submit">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full h-full space-y-5 px-24 mb-3">
                    <!-- partnership content -->
                    <div class="w-full h-[30%] px-10 py-5 bg-white shadow-md rounded-lg dark:bg-dsecondary dark:border-gray-200 dark:border">
                        <h2 class="text-lg font-semibold text-primary font-quicksand dark:text-dtext">
                            {{ sponsor.name }}
                        </h2>
                    </div>

                    <!-- creating -->
                    <div class="w-full inline-block bg-white shadow-md rounded-lg dark:bg-dsecondary dark:border dark:border-gray-200">
                        <div class="w-full bg-blue-900 dark:bg-primary h-8 flex items-center justify-center rounded-t-lg">
                            <h2 class="text-base font-semibold text-white font-quicksand">Scholarship Information
                            </h2>
                        </div>
                        <div class="flex flex-col gap-2 px-10 py-5">
                                <div class="h-full w-full flex flex-row gap-3">
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
                                        <!-- <div class="mb-3">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Set Application
                                                Timeline</h3>
                                            <div class="flex flex-row gap-3 w-full">
                                                <div class="relative w-full">
                                                    <DatePicker class="w-full" v-model="form.appplication "
                                                        placeholder="Application Start" />
                                                </div>
                                                <div class="relative w-full">
                                                    <DatePicker class="w-full" v-model="form.deadline"
                                                        placeholder="Application Deadline" />
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="flex flex-col gap-2 px-10 py-5">
                                <div class="h-full w-full flex flex-row gap-3">
                                    <div class="w-full">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Limit
                                            Applicants/Recipients</h3>
                                        <ul
                                            class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">All
                                                        Campuses</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Angono</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Antipolo</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Binangonan</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cardona</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cainta</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Morong</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pililla</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rodriguez</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanay</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center justify-between px-3">
                                                    <label for="vue-checkbox"
                                                        class="py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Taytay</label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-rounded absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none text-gray-400">
                                                            person
                                                        </span>
                                                        <input type="text"
                                                            class="w-24 pl-8 h-7 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="w-full">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Requirements</h3>
                                        <ul class="w-full text-sm font-medium text-gray-900 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <div class="flex items-center mb-4 w-full">
                                                <form @submit.prevent="addItem" class="flex items-center w-full">
                                                    <input v-model="newItem" type="text" placeholder="Enter an item"
                                                        class="border border-gray-300 rounded-lg px-4 py-2 flex-grow" />
                                                    <button type="submit"
                                                        class="bg-blue-500 text-white px-4 py-2 ml-2 rounded-lg hover:bg-blue-600">
                                                        Add
                                                    </button>
                                                </form>
                                            </div>

                                            <form @submit.prevent="removeItem">
                                                <ul>
                                                    <li v-for="(item, index) in items" :key="index"
                                                        class="flex items-center justify-between text-base bg-gray-100 px-4 py-2 mb-1 rounded-lg">
                                                        <span>{{ item }}</span>
                                                        <button @click="removeItem(index)"
                                                            class="flex items-center text-red-500 hover:text-red-700">
                                                            <span class="material-symbols-rounded text-red-600">
                                                                delete
                                                            </span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="mb-3">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Add Note</h3>
                                        <textarea id="message" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write additional informations here..."></textarea>
                                    </div>
                                </div>
                            </div> -->
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