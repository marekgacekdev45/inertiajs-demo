<template>
    <div>
        <Head title="Create User"></Head>

        <h1 class="text-3xl">Create New User</h1>

        <form
            @submit.prevent="submit"
            action="/"
            method="post"
            class="max-w-md mx-auto mt-7"
        >
            <div class="mb-6">
                <label
                    for="name"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >Name</label
                >
                <input
                    v-model="form.name"
                    class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="name"
                    id="name"
                    required
                />
                <div v-if="form.errors.name" class="text-red-500 text-xs mt-1">
                    {{ form.errors.name }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="email"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >Email</label
                >
                <input
                    v-model="form.email"
                    class="border border-gray-400 p-2 w-full"
                    type="email"
                    name="email"
                    id="email"
                    required
                />
                <div
                    v-if="form.errors.email"
                    class="text-red-500 text-xs mt-1"
                >
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="password"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >Password</label
                >
                <input
                    v-model="form.password"
                    class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="password"
                    id="password"
                    required
                />
                <div
                    v-if="form.errors.password"
                    class="text-red-500 text-xs mt-1"
                >
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mb-6">
                <button
                    :disabled="form.processing"
                    type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    Submit
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>

import { useForm } from "@inertiajs/vue3";



let form = useForm({
    name: "",
    email: "",
    password: "",
});


let submit = () => {
    form.post("/users", form);
};
</script>
