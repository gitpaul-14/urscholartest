<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="w-full bg-white shadow-sm ">
            <h1 class="text-3xl font-bold font-soratext-left p-3 mx-10">My Feed</h1>
        </div>
        <div class="p-10 overflow-auto h-full space-y-3">
            <div class="p-10 w-full h-1/12 bg-white">
                <div class="flex justify-between items-center mb-4">
                    <h1 v-for="scholar in scholars" :key="scholar.id"
                        class="text-3xl font-poppins font-extrabold text-[darkblue] text-left ">
                        You are qualified for the {{ scholar.scholarship.name }} </h1>

                    
                </div>
            </div>


            <div class="p-10 w-full bg-white">
                <div class="flex justify-between items-center mb-4" >
                    <h1
                        class="text-3xl font-poppins font-extrabold text-[darkblue] text-left ">
                        Uploading Documents</h1>

                    <button class="btn" type="submit">
                        <span class="material-symbols-rounded">
                        outbox
                        </span>
                        Submit
                    </button>
                </div>

                <form @submit.prevent="Submit">
                    <!-- Other form fields -->
                    <div class="flex flex-wrap w-full gap-1" v-for="requirement in requirements" :key="requirements.id"> 
                        <div class="border rounded-md shadow flex flex-col w-1/2 p-3 mb-4" v-for="(req, index) in requirement.requirements" :key="index">
                            <div>
                                <span>{{ req }}</span>
                            </div>
                            <input class="block w-full text-sm text-blue-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 
                                dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                                id="file_input" type="file">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import FileUpload from 'primevue/fileupload';

const props = defineProps({
    scholars: Object,
    scholarships: Object,
    requirements: Object,
});


const fileInput = ref(null);
const selectedFile = ref(null);

const triggerFileInput = () => {
    fileInput.value.click();
};

const handleFileSelect = (event) => {
    const file = event.target.files[0];
    if (file) {
        selectedFile.value = file;
    }
};

const removeFile = () => {
    selectedFile.value = null;
    fileInput.value.value = ''; // Reset input
};

</script>

