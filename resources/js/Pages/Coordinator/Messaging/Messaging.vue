<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #default>
            <div class="w-full h-full box-border">
                <div class="w-1/3 bg-card p-4">
                    <h3 class="text-lg font-bold text-primary mb-4">Persons</h3>
                    <ul>
                    <li class="flex items-center space-x-2 mb-2">
                        <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                        <span class="text-primary-foreground">John Doe</span>
                    </li>
                    <li class="flex items-center space-x-2 mb-2">
                        <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                        <span class="text-primary-foreground">Jane Smith</span>
                    </li>
                    <li class="flex items-center space-x-2 mb-2">
                        <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                        <span class="text-primary-foreground">Alice Johnson</span>
                    </li>
                    </ul>
                </div>
                <div class="w-2/3 bg-card p-4">
                    <h3 class="text-lg font-bold text-primary mb-4">Conversation</h3>
                    <div class="flex flex-col h-full">
                    <div class="flex-1 overflow-y-auto">
                        <div class="flex items-start mb-4">
                        <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                        <div class="bg-primary text-primary-foreground p-2 rounded-lg ml-2 max-w-xs">Kupal ka ba nga ni?</div>
                        </div>
                        <div class="flex items-end justify-end mb-4">
                        <div class="bg-primary text-primary-foreground p-2 rounded-lg mr-2 max-w-xs">Hi! I have a question regarding your services.</div>
                        <img src="https://placehold.co/50" alt="Person" class="h-8 w-8 rounded-full" />
                        </div>
                    </div>
                    <div class="flex items-center">
                        <input type="text" placeholder="Type your message..." class="flex-1 bg-input text-primary-foreground p-2 rounded-lg mr-2" />
                        <button class="bg-primary text-primary-foreground px-4 py-2 rounded-lg hover:bg-primary/80 transition">Send</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <input type="text" placeholder="Type your message..." class="flex-1 bg-input text-primary-foreground p-2 rounded-lg mr-2" />
                <button class="bg-primary text-primary-foreground px-4 py-2 rounded-lg hover:bg-primary/80 transition">Send</button>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
