<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <div class="pt-5">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="bg-primary text-white text-3xl font-sans font-bold p-7">
                        Greetings {call mo firstname}
                    </div>
                    <div class="bg-gray-400 h-screen flex flex-col items-center justify-start px-2">
                        <div class="w-full bg-white shadow-sm rounded-lg overflow-y-auto">
                            <div class="w-full border-b border-border">
                            <div class="w-full p-4 flex items-center">
                                <img class="w-12 h-12 rounded-full" src="https://placehold.co/50x50" alt="user-avatar" />
                                <div class="ml-4">
                                <p class="text-primary font-semibold">URS - HEAD SCHOLARSHIP ADMINISTRATOR</p>
                                <p class="text-sm text-muted">Posted NOV. 15, 2024 @ 10:30 PM Binangonan Campus</p>
                                </div>
                            </div>
                            <div class="bg-gradient-to-t from-blue-900 via-blue-800 to-blue-700 h-48 flex items-center justify-center text-white text-center font-albert text-italic break-words overflow-hidden">
                                <p>fefrgr ghthtyjyj</p>
                            </div>
                        </div>

                            <div class="p-4 border-b border-border">
                            <div class="flex items-center">
                                <img class="w-12 h-12 rounded-full" src="https://placehold.co/50x50" alt="user-avatar" />
                                <div class="ml-4">
                                <p class="text-primary font-semibold">Jane Smith</p>
                                <p class="text-sm text-muted">Posted 5 hours ago</p>
                                </div>
                            </div>
                            <p class="mt-4">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>

                            <div class="p-4 border-b border-border">
                            <div class="flex items-center">
                                <img class="w-12 h-12 rounded-full" src="https://placehold.co/50x50" alt="user-avatar" />
                                <div class="ml-4">
                                <p class="text-primary font-semibold">Alice Johnson</p>
                                <p class="text-sm text-muted">Posted 1 day ago</p>
                                </div>
                            </div>
                            <p class="mt-4">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
