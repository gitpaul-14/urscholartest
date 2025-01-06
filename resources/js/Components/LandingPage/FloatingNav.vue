<template>
    <nav class="flex items-center justify-between shadow-md bg-black mx-[200px] sticky top-3 rounded-lg z-50">
        <div class="flex items-center">
            <img src="../../../assets/images/logo-hori-whitecopy.png" alt="Logo" class="h-20 ml-5" />
        </div>
        <div>
            <ul class="flex space-x-12 font-poppins">
                <li><a href="#" class="text-white hover:text-primary-foreground transition">Home</a></li>
                <li><a href="#" class="text-white hover:text-primary-foreground transition">About</a></li>
                <li><a href="#" class="text-white hover:text-primary-foreground transition">Contact</a></li>
            </ul>
        </div>
        <div class="flex items-center space-x-4 mr-5 font-poppins">
            <Link :href="route('login')"
                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Log in
            </Link>
            <Link :href="route('register')"
                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Register
            </Link>
        </div>
    </nav>

</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>
