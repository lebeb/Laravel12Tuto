<script setup lang="ts">
import AuthenticatedLayout from '@/layouts/AppLayout.vue'
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import InputLabel from '@/components/ui/label/Label.vue';
import PrimaryButton from '@/components/ui/button/Button.vue';
import TextInput from '@/components/ui/input/Input.vue';
import { route } from 'ziggy-js';
import { computed } from 'vue';
import { useRoute } from '@/composables/useRoute';

const route = useRoute();

const props = defineProps({
    address: Object
});

const page = usePage();

const form = useForm({
    label: props.address.label || '',
    street: props.address.street,
    number: props.address.number,
    postal_code: props.address.postal_code,
    city: props.address.city,
    country: props.address.country,
    complement: props.address.complement || ''
});

const submit = () => {
    form.put(route('addresses.update', props.address.id));  //
};

const addressesIndexUrl = computed(() => route('addresses.index'));
</script>

<template>

    <Head title="Modifier l'adresse" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier l'adresse
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="p-6 space-y-6">
                        <div>
                            <InputLabel for="label" value="Libellé (optionnel)" />
                            <TextInput id="label" v-model="form.label" type="text" class="mt-1 block w-full"
                                placeholder="Ex: Maison, Bureau" />
                            <InputError :message="form.errors.label" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-2">
                                <InputLabel for="street" value="Rue *" />
                                <TextInput id="street" v-model="form.street" type="text" class="mt-1 block w-full"
                                    required />
                                <InputError :message="form.errors.street" class="mt-2" />
                            </div>
                            <div>
                                <InputLabel for="number" value="N° *" />
                                <TextInput id="number" v-model="form.number" type="text" class="mt-1 block w-full"
                                    required />
                                <InputError :message="form.errors.number" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <InputLabel for="complement" value="Complément (optionnel)" />
                            <TextInput id="complement" v-model="form.complement" type="text" class="mt-1 block w-full"
                                placeholder="Appartement, étage, code..." />
                            <InputError :message="form.errors.complement" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <InputLabel for="postal_code" value="NPA *" />
                                <TextInput id="postal_code" v-model="form.postal_code" type="text"
                                    class="mt-1 block w-full" required />
                                <InputError :message="form.errors.postal_code" class="mt-2" />
                            </div>
                            <div class="col-span-2">
                                <InputLabel for="city" value="Ville *" />
                                <TextInput id="city" v-model="form.city" type="text" class="mt-1 block w-full"
                                    required />
                                <InputError :message="form.errors.city" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <InputLabel for="country" value="Pays *" />
                            <TextInput id="country" v-model="form.country" type="text" class="mt-1 block w-full"
                                required />
                            <InputError :message="form.errors.country" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">
                                Mettre à jour
                            </PrimaryButton>
                            <Link :href="addressesIndexUrl" class="text-gray-600 hover:text-gray-900">
                                Annuler
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
