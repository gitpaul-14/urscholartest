<script setup>
import { Head, Link, useForm, usePage} from '@inertiajs/vue3';
import { ref } from 'vue';
import FloatLabel from 'primevue/floatlabel';
import InputText from 'primevue/inputtext';
import { DatePicker } from 'primevue';
import { Select } from 'primevue';


const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    first_name: '',
    last_name: '',
    password: '',
    confirm_password: '',
});

const submit = () => {
    form.post(route('student.verify-account.verifying'), {
        onFinish: () => form.reset(),
    });
};

const activeStep = ref(0);
const steps = ref([
  { label: 'Personal', icon: 'person' },
  { label: 'Education', icon: 'history_edu' },
  { label: 'Family', icon: 'diversity_2' },
  { label: 'Organization', icon: 'groups' },
  { label: 'Account', icon: 'identity_platform' },
]);

const goToStep = (index) => {
  activeStep.value = index;
};

const nextStep = () => {
  if (activeStep.value < steps.value.length - 1) {
    activeStep.value++;
  }
};

const gender = ref(null); // Stores the selected value

const genderOptions = ref([
    { name: "Male", value: "male" },
    { name: "Female", value: "female" },
    { name: "Other", value: "other" },
]);

const finishStep = () => {
  alert('Step completed!');
};

const submitStep1 = () => {
  // Add your logic to submit the first step's form
  nextStep();
};


</script>

<template>
    <Head title="Verification" />
    <div class="w-screen h-screen bg-gray-100">
        <form @submit.prevent="submit">
            <div class="w-full flex flex-row justify-between bg-white shadow-sm items-center px-10">
                <h1 class="text-3xl font-bold font-soratext-left p-3 mx-10">Set up your Profile</h1>
                <Link :href="route('logout')" method="post" as="button">
                <span class="material-symbols-rounded" style="color: black;" v-tooltip.right="!dataOpenSideBar ? 'Logout' : ''">
                    logout
                </span>
                </Link>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Set Up
                    </button>
                </div>
            </div>
            <div class="py-3 h-full bg-gray-100">
                <div class="mx-auto max-w-5xl sm:px-6 lg:px-8 ">
                    <div class="flex flex-col space-y-5">
                        <div class="bg-primary text-white text-3xl font-sans font-bold p-7 rounded-lg">
                            Greetings! {{ user.name }}
                        </div>

                        <!-- Stepper Navigation -->
                        <div class="flex flex-row items-center justify-center mt-5 relative w-full">
                            <!-- Background Gray Line (Full Width) -->
                            <div class="absolute top-[30%] left-0 w-full h-1 bg-gray-100 rounded-lg"></div>

                            <div 
                            v-for="(step, index) in steps" 
                            :key="index" 
                            class="relative flex flex-col items-center w-full"
                            @click="goToStep(index)"
                            >
                            <!-- Progress Line (Only for Steps > 0) -->
                            <div 
                                v-if="index !== 0" 
                                class="absolute top-[30%] left-[-50%] h-1 w-full transition-all"
                                :class="{ 
                                'bg-blue-900': activeStep >= index, 
                                'bg-gray-200': activeStep < index 
                                }"
                            ></div>

                            <!-- Step Circle with Icon -->
                            <span 
                                class="material-symbols-rounded text-2xl flex items-center justify-center w-10 h-10 rounded-full transition-all z-10"
                                :class="{
                                'text-white bg-blue-900': activeStep === index, 
                                'text-yellow-600 bg-yellow-100': activeStep > index,
                                'text-gray-400 bg-gray-100': activeStep < index
                                }"
                            >
                                {{ step.icon }}
                            </span>

                            <!-- Step Label -->
                            <div class="mt-2 text-sm font-medium" :class="{ 'text-blue-900': activeStep >= index, 'text-gray-500': activeStep < index }">
                                {{ step.label }}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
                    <div class="flex flex-col space-y-5 mt-10">

                        <div class="stepper-container">
                            <!-- Step Content -->
                            <div class="flex-grow">
                            <div v-if="activeStep === 0">
                                <div class="bg-white grid grid-cols-4 gap-3 rounded-lg h-1/2 items-center justify-start p-10">
                                    <div class="col-span-4">
                                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2 py-1 pl-3 border-primary border-l-4">Account Information</h3>
                                    <p class="font-semibold text-[11px] font-inter uppercase text-gray-400 dark:text-white mb-4">Please fill-up missing required fields</p>
                                    </div>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.first_name" class="w-full" />
                                        <label for="on_label">First Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.last_name" class="w-full" />
                                        <label for="on_label">Last Name</label>
                                    </FloatLabel>
                                    
                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.middle_name" class="w-full" />
                                        <label for="on_label">Middle Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.suffix" class="w-full" />
                                        <label for="on_label">Suffix Name</label>
                                    </FloatLabel>

                                    <DatePicker class="w-full dark:bg-dsecondary dark:text-white" v-model="selectedStart"
                                    @update:model-value="handleDateStart" placeholder="Birthdate" />

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.birthplace" class="w-full" />
                                        <label for="on_label">Place of Birth</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.age" class="w-full" />
                                        <label for="on_label">Age</label>
                                    </FloatLabel>

                                    <FloatLabel class="w-full md:w-56" variant="on">
                                        <Select v-model="form.gender" inputId="on_label" :options="genderOptions" optionLabel="name" class="w-full" 
                                        :pt="{
                                            option: { 
                                                class: 'myclass',
                                            },
                                            SelectState: {
                                                style: 'background-color: #e5e7eb !important; color: #374151 !important;',
                                            },
                                            optionCheckIcon: { 
                                                style: 'background-color: blue !important; color: white !important;',  // Custom style for selected option
                                            },
                                        }"/>
                                        <label for="on_label">Gender</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.password" class="w-full" />
                                        <label for="on_label">Set New Password</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.confirm_password" class="w-full" />
                                        <label for="on_label">Confirm Password</label>
                                    </FloatLabel>
                                    
                                    <div class="col-span-2 flex justify-end mt-4">
                                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            Next</button>
                                    </div>
                                </div>
                            </div>
                            <div v-if="activeStep === 1">
                                <div class="bg-white grid grid-cols-2 gap-2 rounded-lg h-1/2 items-center justify-start p-10">
                                    <div class="col-span-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2 py-1 pl-3 border-primary border-l-4">Educational Background</h3>
                                    <p class="font-semibold text-[11px] font-inter uppercase text-gray-400 dark:text-white mb-4">Please fill-up missing required fields</p>
                                    </div>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.first_name" class="w-full" />
                                        <label for="on_label">First Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.last_name" class="w-full" />
                                        <label for="on_label">Last Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.email" readonly="" class="w-full" />
                                        <label for="on_label">Email</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.password" class="w-full" />
                                        <label for="on_label">Set New Password</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.confirm_password" class="w-full" />
                                        <label for="on_label">Confirm Password</label>
                                    </FloatLabel>
                                    
                                    <div class="col-span-2 flex justify-end mt-4">
                                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            Next</button>
                                    </div>
                                </div>
                            </div>
                            <div v-if="activeStep === 2">
                                <div class="bg-white grid grid-cols-2 gap-2 rounded-lg h-1/2 items-center justify-start p-10">
                                    <div class="col-span-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2 py-1 pl-3 border-primary border-l-4">Educational Background</h3>
                                    <p class="font-semibold text-[11px] font-inter uppercase text-gray-400 dark:text-white mb-4">Please fill-up missing required fields</p>
                                    </div>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.first_name" class="w-full" />
                                        <label for="on_label">First Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.last_name" class="w-full" />
                                        <label for="on_label">Last Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.email" readonly="" class="w-full" />
                                        <label for="on_label">Email</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.password" class="w-full" />
                                        <label for="on_label">Set New Password</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.confirm_password" class="w-full" />
                                        <label for="on_label">Confirm Password</label>
                                    </FloatLabel>
                                    
                                    <div class="col-span-2 flex justify-end mt-4">
                                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            Next</button>
                                    </div>
                                </div>
                            </div>
                            <div v-if="activeStep === 3">
                                <div class="bg-white grid grid-cols-2 gap-2 rounded-lg h-1/2 items-center justify-start p-10">
                                    <div class="col-span-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2 py-1 pl-3 border-primary border-l-4">Educational Background</h3>
                                    <p class="font-semibold text-[11px] font-inter uppercase text-gray-400 dark:text-white mb-4">Please fill-up missing required fields</p>
                                    </div>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.first_name" class="w-full" />
                                        <label for="on_label">First Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.last_name" class="w-full" />
                                        <label for="on_label">Last Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.email" readonly="" class="w-full" />
                                        <label for="on_label">Email</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.password" class="w-full" />
                                        <label for="on_label">Set New Password</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                        <InputText id="on_label" v-model="form.confirm_password" class="w-full" />
                                        <label for="on_label">Confirm Password</label>
                                    </FloatLabel>
                                    
                                    <div class="col-span-2 flex justify-end mt-4">
                                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                            Next</button>
                                    </div>
                                </div>
                            </div>
                            <div v-if="activeStep === 4">
                                <form @submit.prevent="submitStep1">
                                    <div class="bg-white grid grid-cols-2 gap-2 rounded-lg h-1/2 items-center justify-start p-10">
                                        <div class="col-span-2">
                                        <h3 class="font-semibold text-gray-900 dark:text-white mb-2 py-1 pl-3 border-primary border-l-4">Account Setup</h3>
                                        <p class="font-semibold text-[11px] font-inter uppercase text-gray-400 dark:text-white mb-4">Please change and update you password to your preference</p>
                                        </div>

                                        <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                            <InputText id="on_label" v-model="form.email" readonly="" class="w-full" />
                                            <label for="on_label">Email</label>
                                        </FloatLabel>

                                        <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                            <InputText id="on_label" v-model="form.password" class="w-full" />
                                            <label for="on_label">Set New Password</label>
                                        </FloatLabel>

                                        <FloatLabel variant="on" class="mt-5 w-full col-span-2">
                                            <InputText id="on_label" v-model="form.confirm_password" class="w-full" />
                                            <label for="on_label">Confirm Password</label>
                                        </FloatLabel>
                                        
                                        <div class="col-span-2 flex justify-end mt-4">
                                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                                Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        <!-- account Verification -->
                        

                        <!-- account Verification -->
                       


                        <!-- <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Middle Name</label>
                            </FloatLabel>

                            <div class="flex flex-col gap-2">
                                <div class="flex flex-row gap-2">
                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.name" class="w-full" />
                                        <label for="on_label">First Name</label>
                                    </FloatLabel>

                                    <FloatLabel variant="on" class="w-full">
                                        <InputText id="on_label" v-model="form.name" class="w-full" />
                                        <label for="on_label">First Name</label>
                                    </FloatLabel>
                                </div>
                            </div> -->

                            <!-- <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Middle Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Middle Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Middle Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Middle Name</label>
                            </FloatLabel>
                            
                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Middle Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Middle Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Middle Name</label>
                            </FloatLabel> -->



                        <!-- college education -->
                        <!-- <div class="bg-white grid grid-cols-2 gap-3 rounded-lg h-1/2 items-center justify-start px-4 py-4">
                            <div class="col-span-2"><h3 class="font-semibold text-gray-900 dark:text-white">Personal Information</h3></div>
                            <div class="col-span-2"><h3 class="font-semibold text-gray-900 dark:text-white">College Education</h3></div>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <div class="flex flex-row gap-2">
                                <FloatLabel variant="on" class="w-full">
                                    <InputText id="on_label" v-model="form.name" class="w-full" />
                                    <label for="on_label">Year & Section</label>
                                </FloatLabel>

                                <FloatLabel variant="on" class="w-full">
                                    <InputText id="on_label" v-model="form.name" class="w-full" />
                                    <label for="on_label">Student ID</label>
                                </FloatLabel>
                            </div>
                            
                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Campus</label>
                            </FloatLabel>

                            <div class="flex flex-col gap-2">
                                <div class="flex flex-row gap-2">
                                    <div class="flex items-center">
                                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default radio</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default radio</label>
                                    </div>
                                </div>
                                <div class="flex flex-row gap-2">
                                    <div class="flex items-center">
                                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default radio</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default radio</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="bg-white grid grid-cols-3 gap-3 rounded-lg h-1/2 items-center justify-start px-4 py-4">
                            <div class="col-span-2"><h3 class="font-semibold text-gray-900 dark:text-white">Education</h3></div>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-1">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Campus</label>
                            </FloatLabel>
                            
                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-1">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Campus</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-1">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Campus</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-1">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Campus</label>
                            </FloatLabel>

                        </div>

                        <div class="bg-white grid grid-cols-2 gap-3 rounded-lg h-1/2 items-center justify-start px-4 py-4">
                            <div class="col-span-2"><h3 class="font-semibold text-gray-900 dark:text-white">Family Background</h3></div>
                            <div class="col-span-2"><h3 class="font-semibold text-gray-900 dark:text-white">Mother <span class="font-italic">(Leave Blank if deceased)</span></h3></div>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">First Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Last Name</label>
                            </FloatLabel>
                            
                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <div class="flex flex-row gap-2">
                                <FloatLabel variant="on" class="w-full">
                                    <InputText id="on_label" v-model="form.name" class="w-full" />
                                    <label for="on_label">Year & Section</label>
                                </FloatLabel>

                                <FloatLabel variant="on" class="w-full">
                                    <InputText id="on_label" v-model="form.name" class="w-full" />
                                    <label for="on_label">Student ID</label>
                                </FloatLabel>
                            </div>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">First Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Last Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>


                            <div class="col-span-2"><h3 class="font-semibold text-gray-900 dark:text-white">Father <span class="font-italic">(Leave Blank if deceased)</span></h3></div>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">First Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Last Name</label>
                            </FloatLabel>
                            
                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <div class="flex flex-row gap-2">
                                <FloatLabel variant="on" class="w-full">
                                    <InputText id="on_label" v-model="form.name" class="w-full" />
                                    <label for="on_label">Year & Section</label>
                                </FloatLabel>

                                <FloatLabel variant="on" class="w-full">
                                    <InputText id="on_label" v-model="form.name" class="w-full" />
                                    <label for="on_label">Student ID</label>
                                </FloatLabel>
                            </div>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">First Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.name" class="w-full" />
                                <label for="on_label">Last Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full col-span-2">
                                <InputText id="on_label" v-model="value3" class="w-full" />
                                <label for="on_label">Course</label>
                            </FloatLabel>

                        </div> -->




                                <!-- <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="floating_email" id="floating_email" v-model="form.name" readonly
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="floating_email"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="email" name="floating_email" id="floating_email" v-model="form.email" readonly
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="floating_email"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                                        address</label>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="text" name="floating_first_name" id="floating_first_name" v-model="form.first_name"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_first_name"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                            name</label>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="text" name="floating_last_name" id="floating_last_name" v-model="form.last_name"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder="" />
                                        <label for="floating_last_name"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                                            name</label>
                                    </div>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="floating_password" id="floating_password" v-model="form.password"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="floating_password"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="repeat_password" id="floating_repeat_password" v-model="form.confirm_password"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="floating_repeat_password"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm
                                        password</label>
                                </div>

                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Submit</button> -->
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>



<!-- <div class="bg-gray-200 h-full space-y-2 flex flex-col items-center justify-start px-2 pt-2">
    <form class="max-w-md mx-auto" @submit.prevent="submit">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_email" id="floating_email" v-model="form.name" readonly
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="floating_email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="floating_email" id="floating_email" v-model="form.email" readonly
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="floating_email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                address</label>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="floating_first_name" id="floating_first_name" v-model="form.first_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="floating_first_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                    name</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="floating_last_name" id="floating_last_name" v-model="form.last_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" />
                <label for="floating_last_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                    name</label>
            </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="floating_password" id="floating_password" v-model="form.password"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="floating_password"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="repeat_password" id="floating_repeat_password" v-model="form.confirm_password"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="floating_repeat_password"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm
                password</label>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</div> -->

<style scoped>
::v-deep .p-select-option.p-select-option-selected {
  background-color: blue;
  color: white;
}

/* Optionally, if you want to style the label as well */
.p-dropdown .p-dropdown-label {
  color: blue !important;
  font-weight: bold;
}

.p-select-option.p-select-option-selected {
  background-color: blue !important;
  color: white !important;
}

.p-dropdown-item.p-highlight {
  background-color: blue !important;
  color: white !important;
}

/* Style for selected item displayed in the dropdown */
.p-dropdown .p-dropdown-label {
  color: blue !important;
  font-weight: bold;
}

.stepper-container {
  display: flex;
  flex-direction: column;
}

.step-number {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background-color: #ddd;
  display: flex;
  align-items: center;
  justify-content: center;
}

.step-title {
  margin-left: 10px;
}

.step.active .step-number {
  background-color: #4CAF50;
  color: white;
}

.step.completed .step-number {
  background-color: #2196F3;
  color: white;
}

.stepper-nav .step:hover {
  background-color: #f0f0f0;
}


/* form {
  display: flex;
  flex-direction: column;
}

form input {
  margin: 10px 0;
  padding: 10px;
  border: 1px solid #ccc;
}

form button {
  margin-top: 20px;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
} */
</style>