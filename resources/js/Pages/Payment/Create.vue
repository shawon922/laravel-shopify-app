<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';


const user = usePage().props.auth.user;

const form = useForm({
    receiver_id: '',
    amount: '',
});
</script>

<template>
    <div>
        <Head title="Profile" />

        <AuthenticatedLayout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Payment Information</h2>
                </header>
                
                <form @submit.prevent="form.post(route('payment.store'))" class="mt-6 space-y-6">
                    <div>
                        <InputLabel for="receiver_id" value="Receiver" />

                        <TextInput
                            id="receiver_id"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.receiver_id"
                            required
                            autofocus
                            autocomplete="receiver_id"
                        />

                        <InputError class="mt-2" :message="form.errors.receiver_id" />
                    </div>

                    <div>
                        <InputLabel for="amount" value="Amount" />

                        <TextInput
                            id="amount"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.amount"
                            required
                            autofocus
                            autocomplete="amount"
                        />

                        <InputError class="mt-2" :message="form.errors.amount" />
                    </div>

                    <div class="flex items-center gap-4">
                        <PrimaryButton>Save</PrimaryButton>
                    </div>
                </form>
            </section>
                </div>
            </div>
        </div>

        </AuthenticatedLayout>
    </div>
</template>
