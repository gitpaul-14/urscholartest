<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <!-- <Head title="Log in" /> -->
<!-- 
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div> -->

        <form @submit.prevent="submit" class="fit-content flex flex-col items-center justify-center"> 
            <!-- inside here naka comment -->
             
            <!-- header login -->
            <div class="relative flex items-center justify-center">
                <!-- logo -->
                <div class="absolute z-10 w-[50%] h-full">
                    <img src="../../../assets/images/logo-hori-white_login.png" alt="">
                </div>
                <!-- bg -->
                <img src="../../../assets/images/login-bg.png" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-blue-950 opacity-65"></div>
            </div>
            <!-- form login -->
            <div class="w-full fit-content relative flex flex-col gap-1 px-10 py-9">
                <div class="flex flex-col items-start justify-start mb-8">
                    <p class="font-extrabold font-sora text-2xl">Login to your Account</p>
                    <span class="max-w-[80%]">Testing Subtitles</span>
                </div>
                <div>
                    <InputLabel for="email" value="Email" class="font-poppins font-semibold text-md mb-2" />
                    
                    <!-- <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        aria-placeholder="Your Scholar ID"
                    /> -->
                    <input placeholder="name@mail.com" title="Input title" name="input-name" type="email" id="email" v-model="form.email" required autofocus autocomplete="username"
                    class="w-full h-12 bg-[#f1f1f1] border-0 border-b-2 border-[myblack] focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <InputLabel for="password" value="Password" class="font-poppins font-semibold text-md mt-6 mb-2"/>

                    <!-- <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    /> -->
                    <input placeholder="Password" title="Input title" name="input-name" type="text" id="password" v-model="form.password" required autofocus autocomplete="current-password"
                    class="w-full h-12 bg-[#f1f1f1] border-0 border-b-2 border-[myblack] focus:outline-none focus:border-blue-500">
                </div>
                <button class="bg-gradient-to-b from-blue-800 to-blue-900 text-white text-sm font-semibold w-full h-12 flex items-center justify-center rounded-md drop-shadow-sm cursor-pointer mt-5" :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">LOGIN NOW</button>
            </div>
            <div class="mt-10 mb-3 font-poppins text-sm text-gray-500">
                URScholar 2024. All rights reserved 
            </div>
        </form>
    </GuestLayout>
</template>

<!-- <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600"
                        >Remember me</span
                    >
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </PrimaryButton>
            </div> -->