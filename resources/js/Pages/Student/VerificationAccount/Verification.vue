<script setup>
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import FloatLabel from 'primevue/floatlabel';
import InputText from 'primevue/inputtext';


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

                        <!-- account Verification -->
                        <div class="bg-white grid grid-cols-2 gap-3 rounded-lg h-1/2 items-center justify-start px-4 py-4">
                            <div class="col-span-2"><h3 class="font-semibold text-gray-900 dark:text-white">Account Information</h3></div>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.first_name" class="w-full" />
                                <label for="on_label">First Name</label>
                            </FloatLabel>

                            <FloatLabel variant="on" class="w-full">
                                <InputText id="on_label" v-model="form.last_name" class="w-full" />
                                <label for="on_label">Last Name</label>
                            </FloatLabel>

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
                            
                        </div>

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