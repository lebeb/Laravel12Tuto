<script setup lang="ts">
import AuthenticatedLayout from '@/layouts/AppLayout.vue'
import { Head, Link, router } from '@inertiajs/vue3';
import { useRoute } from '@/composables/useRoute';

const route = useRoute();

interface Address {
    id: number;
    label?: string;
    street: string;
    number: string;
    complement?: string;
    postal_code: string;
    city: string;
    country: string;
}

interface Props {
    addresses: Address[];
}

const props = defineProps<Props>();

const deleteAddress = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette adresse ?')) {
        router.delete(route('addresses.destroy', id));
    }
};
</script>

<template>

    <Head title="Adresses" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Mes Adresses
                </h2>
                <Link :href="route('addresses.create')"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                    + Nouvelle adresse
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div v-if="addresses.length === 0" class="text-center py-8 text-gray-500">
                            Aucune adresse enregistrée. Commencez par en créer une !
                        </div>

                        <div v-else class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                            <div v-for="address in addresses" :key="address.id"
                                class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-semibold text-lg text-gray-900">
                                        {{ address.label || 'Adresse' }}
                                    </h3>
                                    <div class="flex gap-2">
                                        <Link :href="route('addresses.edit', address.id)"
                                            class="text-blue-600 hover:text-blue-800">
                                            ✏️
                                        </Link>
                                        <button @click="deleteAddress(address.id)"
                                            class="text-red-600 hover:text-red-800">
                                            🗑️
                                        </button>
                                    </div>
                                </div>

                                <div class="text-gray-700 text-sm space-y-1">
                                    <p>{{ address.street }} {{ address.number }}</p>
                                    <p v-if="address.complement" class="text-gray-500">
                                        {{ address.complement }}
                                    </p>
                                    <p>{{ address.postal_code }} {{ address.city }}</p>
                                    <p class="font-medium">{{ address.country }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
