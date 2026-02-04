<script setup>
import { Head } from '@inertiajs/vue3'

const props = defineProps({
    message: String,
    users: Array
})
</script>

<template>

    <Head title="Test Page" />

    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-gray-900 mb-8">
                {{ message }}
            </h1>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-semibold mb-4">Users:</h2>
                <ul class="space-y-2">
                    <li v-for="user in users" :key="user" class="text-gray-700">
                        • {{ user }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
