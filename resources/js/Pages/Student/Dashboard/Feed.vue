<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="w-full bg-white shadow-sm ">
            <h1 class="text-3xl font-bold font-soratext-left p-3 mx-10">My Feed</h1>
        </div>
        <div class="pt-3 overflow-auto h-screen">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 ">
                <div class="overflow-hidden bg-white rounded-lg shadow-sm mb-10">
                    <div class="bg-primary text-white text-3xl font-sans font-bold p-7 rounded-lg">
                        Greetings! {{$page.props.auth.user.name}}
                    </div>
                    <div class="bg-gray-200 h-full space-y-2 flex flex-col items-center justify-start px-2 pt-2">
                        <div class="w-full bg-white border rounded-lg">
                            <div class="w-full p-4 flex items-center">
                                <img class="w-12 h-12 rounded-full" src="https://placehold.co/50x50" alt="user-avatar" />
                                <div class="ml-4">
                                    <p class="text-primary font-semibold">URS - HEAD SCHOLARSHIP ADMINISTRATOR</p>
                                    <p class="text-sm text-muted">Posted NOV. 15, 2024 @ 10:30 PM Binangonan Campus</p>
                                </div>
                            </div>
                            <div class="bg-gradient-to-t from-blue-900 via-blue-800 to-blue-700 h-96 flex items-center justify-center text-white text-xl text-center font-onest text-bold break-words overflow-hidden mb-2">
                                <p>fefrgr ghthtyjyj</p>
                            </div>
                        </div>

                        <div class="w-full bg-white border rounded-lg">
                            <div class="w-full p-4 flex items-center">
                                <img class="w-12 h-12 rounded-full" src="https://placehold.co/50x50" alt="user-avatar" />
                                <div class="ml-4">
                                    <p class="text-primary font-semibold">URS - HEAD SCHOLARSHIP ADMINISTRATOR</p>
                                    <p class="text-sm text-muted">Posted NOV. 15, 2024 @ 10:30 PM Binangonan Campus</p>
                                </div>
                            </div>
                            <div class="bg-gradient-to-t from-blue-900 via-blue-800 to-blue-700 h-96 flex items-center justify-center text-white text-xl text-center font-onest text-bold break-words overflow-hidden mb-2">
                                <p>fefrgr ghthtyjyj</p>
                            </div>
                        </div>

                        <div class="w-full bg-white border rounded-lg">
                            <div class="w-full p-4 flex items-center">
                                <img class="w-12 h-12 rounded-full" src="https://placehold.co/50x50" alt="user-avatar" />
                                <div class="ml-4">
                                    <p class="text-primary font-semibold">URS - HEAD SCHOLARSHIP ADMINISTRATOR</p>
                                    <p class="text-sm text-muted">Posted NOV. 15, 2024 @ 10:30 PM Binangonan Campus</p>
                                </div>
                            </div>
                            <div class="bg-gradient-to-t from-blue-900 via-blue-800 to-blue-700 h-96 flex items-center justify-center text-white text-xl text-center font-onest text-bold break-words overflow-hidden mb-2">
                                <p>fefrgr ghthtyjyj</p>
                            </div>
                        </div>

                        <div class="w-full bg-white border rounded-lg">
                            <div class="w-full p-4 flex items-center">
                                <img class="w-12 h-12 rounded-full" src="https://placehold.co/50x50" alt="user-avatar" />
                                <div class="ml-4">
                                    <p class="text-primary font-semibold">URS - HEAD SCHOLARSHIP ADMINISTRATOR</p>
                                    <p class="text-sm text-muted">Posted NOV. 15, 2024 @ 10:30 PM Binangonan Campus</p>
                                </div>
                            </div>
                            <div class="bg-gradient-to-t from-blue-900 via-blue-800 to-blue-700 h-96 flex items-center justify-center text-white text-xl text-center font-onest text-bold break-words overflow-hidden mb-2">
                                <p>fefrgr ghthtyjyj</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
