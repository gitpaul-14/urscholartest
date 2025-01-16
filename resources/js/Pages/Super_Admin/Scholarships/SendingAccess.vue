<template>
    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <div class="w-full h-full px-10 py-5 bg-[#F8F8FA] overflow-auto">
            <div class="w-full mx-auto p-3 rounded-xl text-white">
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
                            <span>List of Scholars</span>
                        </a>
                        </li>
                        <li>
                        <a>
                            <span class="text-blue-400 font-semibold">Sending Access</span>
                        </a>
                        </li>
                    </ul>
                </div>
                
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-3xl font-poppins font-extrabold text-[darkblue] text-left underline underline-offset-4">Pending Scholars</h1>

                    <button class="btn bg-blue-900 text-white" @click="toggleCreate" >
                        <span class="material-symbols-rounded">
                        send
                        </span>
                        Forward
                    </button>
                </div>

                <div class="w-full h-full space-y-5 mb-3">
                    <!-- partnership content -->
                    <div class="w-full h-[30%] px-5 py-5 bg-[white] shadow-md space-y-5">
                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            Recipients</h3>
                        <div  class="flex flex-wrap gap-2 bg-gray-50 w-full h-full border border-gray-300 rounded-lg p-2.5">
                            <span v-for="(scholar, index) in scholars" :key="scholar.id" class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ scholar.email }}</span>
                        </div>

                        <h3 class="font-semibold text-gray-900 dark:text-white">
                            Subject</h3>
                        <textarea id="message" rows="2"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write Title to the message"></textarea>
                        
                        <div class="flex flex-col gap-2">
                            <div class="h-full w-full flex flex-row gap-3">
                                <div class="w-full">
                                    <div class="mb-3">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Add Messages</h3>
                                        <textarea id="message" rows="15"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write additional informations here..."></textarea>
                                    </div>
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
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted, computed } from 'vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { Tooltip } from 'primevue';

const props = defineProps({
    scholars: {
        type: Array,
        required: true
    },
    scholarships: {
        type: Object,
        required: true
    }
});

const directives = {
    Tooltip,
};

const isCreating = ref(false);
const isEditing = ref(false);
const form = ref({
    id: null,
    name: '',
    description: '',
    sponsor_id: ''
});

const getSponsorName = (sponsorId) => {
    const sponsor = props.sponsors.find(s => s.id === sponsorId);
    return sponsor ? sponsor.name : 'Unknown Sponsor';
};

const toggleCreate = () => {
    isCreating.value = !isCreating.value;
    if (isCreating.value) {
        resetForm();
    }
};

const resetForm = () => {
    form.value = { 
        id: null, 
        name: '', 
        description: '', 
        sponsor_id: '' 
    };
};


</script>

<style scoped>
.p-tooltip-text {
  margin-left: 0px;
  font-size: 13px !important;
}
</style>