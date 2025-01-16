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
                    <div class="flex flex-wrap w-full gap-1"> 
                        <div class="border rounded-md shadow flex flex-col w-1/2 p-3 mb-4" v-for="requirement in requirements" :key="requirements.id">
                            <div >
                                <span>{{requirement.requirements[0]}}</span>
                            </div>
                            <input class="block w-full text-sm text-blue-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 
                                dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                                id="file_input" type="file">
                        </div>
                        <div class="border rounded-md shadow flex flex-col w-1/2 p-3 mb-4" v-for="requirement in requirements" :key="requirements.id">
                            <div >
                                <span>{{requirement.requirements[1]}}</span>
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





const requirements = ref([])
const loading = ref(true)
const error = ref(null)

const fetchRequirements = async () => {
  try {
    const response = await axios.get('/requirements')
    requirements.value = response.data
    loading.value = false
  } catch (err) {
    error.value = 'Failed to load requirements'
    loading.value = false
  }
}

// Display methods for different types of requirement data
const displayRequirement = (requirement) => {
  if (Array.isArray(requirement)) {
    return requirement
  }
  if (typeof requirement === 'object') {
    return Object.entries(requirement)
  }
  return [requirement]
}

onMounted(() => {
  fetchRequirements()
})
</script>

<template>
  <div class="requirements-container p-4">
    <div v-if="loading" class="text-center">
      Loading requirements...
    </div>
    
    <div v-else-if="error" class="text-red-500">
      {{ error }}
    </div>
    
    <div v-else>
      <div v-for="item in requirements" :key="item.id" class="mb-6 bg-white rounded-lg shadow p-4">
        <h3 class="text-lg font-semibold mb-2">Requirement #{{ item.id }}</h3>
        
        <!-- Option 1: Simple List -->
        <div v-if="Array.isArray(item.requirements_json)" class="space-y-2">
          <div v-for="(req, index) in item.requirements_json" 
               :key="index"
               class="p-2 bg-gray-50 rounded">
            {{ req }}
          </div>
        </div>
        
        <!-- Option 2: Key-Value Display -->
        <div v-else-if="typeof item.requirements_json === 'object'" class="space-y-2">
          <div v-for="(value, key) in item.requirements_json" 
               :key="key"
               class="p-2 bg-gray-50 rounded flex justify-between">
            <span class="font-medium">{{ key }}:</span>
            <span>{{ value }}</span>
          </div>
        </div>
        
        <!-- Option 3: Nested Data -->
        <div v-if="typeof item.requirements_json === 'object' && item.requirements_json.nested">
          <div v-for="(category, catIndex) in item.requirements_json.nested" 
               :key="catIndex"
               class="mt-4">
            <h4 class="font-medium mb-2">{{ catIndex }}</h4>
            <div v-for="(req, reqIndex) in displayRequirement(category)" 
                 :key="reqIndex"
                 class="ml-4 p-2 bg-gray-50 rounded mb-2">
              {{ Array.isArray(req) ? `${req[0]}: ${req[1]}` : req }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
