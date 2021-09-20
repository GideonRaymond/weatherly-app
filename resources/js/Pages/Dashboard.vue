<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-2xl text-white leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden border-2 border-red-300 bg-indigo-900 shadow-xl sm:rounded-lg max-h-96">
                    <div class="w-screen h-screen"></div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
        },
    })
</script>
