<template>
    <div>
        <Head title="Users">
            <meta
                name="description"
                content="Info about users page"
                head-key="description"
            />
        </Head>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl">Users</h1>

            <input
                v-model="search"
                type="text"
                name=""
                id=""
                placeholder="Search..."
                class="border px-2 rounded-lg"
            />
        </div>

        <ul class="my-6 border border-black rounded-xl divide-y divide-black">
            <li
                v-for="user in users.data"
                :key="user.id"
                class="p-5 flex items-center justify-between"
            >
                <span>{{ user.name }}</span>
                <Link
                    :href="`/users/${user.id}/edit`"
                    class="text-indigo-700 border-b-2 border-transparent hover:border-indigo-700"
                >
                    Edit
                </Link>
            </li>
        </ul>
        <Pagination :links="users.links" />
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { Head } from "@inertiajs/vue3";
import Pagination from "./Shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";

let props = defineProps({
    users: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(search, (value) => {
    router.get("/users", { search: value }, { preserveState: true ,replace:true});
});
</script>
