<template>
    <Link :href="href" class="inline-flex bg-red-300 items-center px-3 py-2 text-md font-semibold leading-5 text-white focus:outline-none focus:border-indigo-700 transition hover:bg-red-500 rounded-md">
        <slot />
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['href', 'active']
    })
</script>
