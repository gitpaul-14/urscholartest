<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import Echo from 'laravel-echo';

const props = defineProps({
    messages: Array,
});

</script>

<template>
    <Head title="Chat" />

    <AuthenticatedLayout>
        <template #default>
            <div class="grid grid-cols-4 bg-[#F8F8FA] px-40 h-full">
                <div class="bg-white col-span-2 h-full flex flex-col bg-card border overflow-visible">
                    <h3 class="text-xl text-primary mb-1 px-4 pt-4 pb-0 font-poppins font-extrabold ">Messages</h3>
                    <!-- search -->
                    <form class="w-full p-3">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search group chats and scholars" required />
                            <!-- <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> -->
                        </div>
                    </form>
                    <!-- people gc, etc -->
                    <ul>
                    <li class="w-full flex items-center space-x-2 mb-2 hover:bg-gray-100 p-4">
                        <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                        <span class="text-primary-foreground font-quicksand font-semibold text-lg">John Doe Dimacatacutan</span>
                    </li>
                    <li class="w-full flex items-center space-x-2 mb-2 hover:bg-gray-100 p-4">
                        <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                        <span class="text-primary-foreground font-quicksand font-semibold text-lg">John Doe Dimacatacutan</span>
                    </li>
                    </ul>
                </div>
                <div class="bg-white col-span-2 h-full flex flex-col space-y-3 bg-card p-4 border">
                    <h3 class="text-lg font-bold text-primary mb-4">Conversation</h3>
                    <div class="flex flex-col h-full">
                    <div class="flex-1 overflow-y-auto">
                        <div>
                            <div class="flex items-end">
                            <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                            <div class="bg-primary text-primary-foreground p-2 rounded-lg ml-2 max-w-xs" v-for="message in messages" :key="message.id">{{ message.content }}</div>
                            </div>
                            <div class="flex justify-start items-start pl-10 text-sm">
                                Time
                            </div>
                        </div>
                        <span class="py-2 w-full"></span>
                        <div>
                            <div class="flex items-end justify-end">
                                <div class="bg-primary text-white p-2 rounded-lg mr-2 max-w-xs">Hi! I have a question regarding your services.</div>
                                <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                            </div>
                            <div class="flex justify-end items-end pr-10 text-sm">
                                Time
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <input type="text" placeholder="Type your message..." class="flex-1 bg-input text-primary-foreground p-2 rounded-lg mr-2" />
                        <button class="bg-primary text-primary-foreground px-4 py-2 rounded-lg hover:bg-primary/80 transition">Send</button>
                    </div>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
