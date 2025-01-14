<template>
    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <template #default>
            <!-- Content Area -->
            <div class="flex flex-col lg:flex-row w-full h-[calc(100vh-50px)]">
                <!-- Sidebar -->
                <SettingsNav />

                <!-- Main Content -->
                <div class="flex-1 lg:h-full h-auto lg:ml-0 bg-gray-100">
                <slot></slot>
                </div>
            </div>
        </template>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted } from 'vue';
import { Head, useForm, Link, } from '@inertiajs/vue3';
import { Tooltip } from 'primevue';
import SettingsNav from '../../../Components/Settings/SettingsSubMenu.vue';

defineProps({
    scholarships: Array,
});

const directives = {
    Tooltip,
};

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

<style scoped>
.p-tooltip-text {
  margin-left: 0px;
  font-size: 13px !important;
}
</style>