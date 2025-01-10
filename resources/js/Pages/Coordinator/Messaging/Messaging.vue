<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import Echo from 'laravel-echo';
import { format, isToday } from 'date-fns';

const props = defineProps({
    messages: Array,
    currentUser: Object, // Pass the authenticated user object from Laravel
});

const form = useForm({
    content: '', // Initialize the content for the message input
});

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return isToday(date) ? format(date, 'HH:mm') : format(date, 'dd MMM');
};

// Function to send a message
const sendMessage = () => {
    form.post('/messages', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset(); // Clear the input after sending the message
        },
        onError: (errors) => {
            console.error('Validation errors:', errors);
        },
    });
};

// Set up real-time listener using Laravel Echo
onMounted(() => {
    const echo = new Echo({
        broadcaster: 'pusher',
        key: import.meta.env.VITE_PUSHER_APP_KEY,
        cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
        forceTLS: true,
    });

    // Listen for the "MessageSent" event on the 'chat' channel
    echo.channel('chat')
        .listen('MessageSent', (e) => {
            // When a new message is received, prepend it to the messages array
            // This will ensure it shows up at the top of the chat
            messages.value.push(e.message); // Add the new message at the top
        });
});
</script>

<template>

    <Head title="Chat" />

    <AuthenticatedLayout>
        <template #default>
            
        </template>
    </AuthenticatedLayout>
</template>
