<template>
    <Link
        class="text-black hover:underline"
        :class="{ 'font-bold underline': active }"
        ><slot></slot
    ></Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
// export default {
//     components: { Link },
defineProps ({
    active: Boolean,
});
</script>
