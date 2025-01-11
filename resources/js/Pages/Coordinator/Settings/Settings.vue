<template>
    <Head title="Scholarships" />
    <AuthenticatedLayout>
        <template #default>
            <!-- <div class="grid grid-rows-3 grid-flow-col bg-[#F8F8FA] px-40 h-full">
                <div class="bg-white h-full row-span-1 bg-card border overflow-visible">
                    <h3 class="text-xl text-primary mb-1 px-4 pt-4 pb-0 font-poppins font-extrabold ">Messages</h3>
                </div>
                <div class="bg-white h-full row-span-4 space-y-3 bg-card border">
                    
                </div>
            </div> -->
            <div>
                
            </div>
        </template>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted } from 'vue';
import { Head, useForm, Link, } from '@inertiajs/vue3';
import { Tooltip } from 'primevue';

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