<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import { Head, useForm, Link,  } from '@inertiajs/vue3';

defineProps({
    scholarships: Array,
});

const isCreating = ref(false);
const isEditing = ref(false);
const form = ref({
    id: null,
    name: null,
    description: null,
});

const toggleCreate = () => {
    isCreating.value = !isCreating.value;
    if (isCreating.value) {
        resetForm();
    }
};

const closeModal = () => {
    isCreating.value = false;
    isEditing.value = false;
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
            await useForm(form.value).put(`/scholarships/${form.value.id}`);
        } else {
            await useForm(form.value).post('/scholarships');
        }

        closeModal();
    } catch (error) {
        console.error('Error submitting form:', error);
    }
};

// const deleteScholarship = async (scholarship) => {
//   // Confirm the action first
//   if (confirm(`Are you sure you want to delete the scholarship "${scholarship.name}"?`)) {
//     try {
//       // Use Inertia's delete request to remove the scholarship
//       await useForm().delete(`/scholarships/${scholarship.id}`);
//       // On success, remove the item from the UI (without refreshing the page)
//       const index = scholarships.value.findIndex(item => item.id === scholarship.id);
//       if (index !== -1) {
//         scholarships.value.splice(index, 1);
//       }

//       // Optionally, display a success message (e.g., with a toast)
//     } catch (error) {
//       console.error('Error deleting scholarship:', error);
//       alert('An error occurred while deleting the scholarship.');
//     }
//   }
// };
</script>

<template>

    <Head title="Scholarships" />

    <AuthenticatedLayout>
        <div class="min-h-screen p-6">
            <div class="max-w-5xl mx-auto bg-[#3A4C7E] p-5 rounded-xl text-white">
                <h1 class="text-3xl font-bold mb-4 text-center">Scholarships</h1>

                <div class="mb-4">
                    <button @click="toggleCreate" class="btn btn-primary w-full">
                        Create New Scholarship
                    </button>
                </div>

                <!-- List of Scholarships -->
                <div v-if="!isCreating && !isEditing">
                    <!-- <table class="table w-full">
                        <thead>
                            <tr class="text-white">
                                <th class="text-left">Name</th>
                                <th class="text-left">Description</th>
                                <th class="text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="scholarship in scholarships" :key="scholarship.id">
                                <td>{{ scholarship.name }}</td>
                                <td>{{ scholarship.description || 'N/A' }}</td>
                                <td>
                                    <div class="space-x-2">
                                        <button @click="editScholarship(scholarship)"
                                            class="btn btn-warning btn-sm">Edit</button>
                                        <button @click="deleteScholarship(scholarship)"
                                            class="btn btn-error btn-sm">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                    <div class="container mx-auto py-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div v-for="scholarship in scholarships" :key="scholarship.id"
                                class="card shadow-lg bg-base-100">
                                <div class="card-body">
                                    <h2 class="card-title text-lg font-semibold">{{ scholarship.name }}</h2>
                                    <p class="text-sm text-gray-600 mb-4">{{ scholarship.description }}</p>
                                    <p class="text-xs text-gray-500">Created on: {{ new
                                        Date(scholarship.created_at).toLocaleDateString() }}</p>
                                    <div class="card-actions justify-end">
                                        <Link :href="`/scholarships/${scholarship.id}`" class="btn btn-primary btn-sm">
                                        View</Link>
                                    </div>
                                    <div class="card-actions justify-end">
                                        <Link :href="`/scholarships/${scholarship.id}/applicants`" class="btn btn-primary btn-sm">
                                            Applicants</Link>
                                    </div>
                                    <button @click="editScholarship(scholarship)"
                                        class="btn btn-warning btn-sm">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="isCreating || isEditing"
                class="fixed inset-0 flex items-center justify-center z-50 bg-gray-500 bg-opacity-75">
                <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                    <h2 class="text-2xl font-bold mb-4">{{ isEditing ? 'Edit Scholarship' : 'Create Scholarship' }}</h2>

                    <form @submit.prevent="submitForm" class="space-y-4">
                        <div>
                            <label for="name" class="label">Scholarship Name</label>
                            <input v-model="form.name" type="text" id="name" placeholder="Enter Scholarship Name"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <label for="description" class="label">Description</label>
                            <textarea v-model="form.description" id="description" placeholder="Enter Description"
                                class="textarea textarea-bordered w-full"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-full">
                            {{ isEditing ? 'Update Scholarship' : 'Create Scholarship' }}
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <button @click="closeModal" class="btn btn-secondary w-full">Close</button>
                    </div>
                </div>
            </div>

        </div>

    </AuthenticatedLayout>
</template>
