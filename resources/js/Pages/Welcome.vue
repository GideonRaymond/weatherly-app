<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen bg-linear-gradient sm:items-center sm:pt-0">
        <div class="flex flex-col w-full max-w-max items-center md:items-start justify-center md:mr-24 px-8">
            <div class="md:text-7xl text-6xl font-light text-white mb-4">Weatherly</div>
            <p class="text-xl md:text-2xl text-center text-white font-semibold mb-5">The only weather app you'll ever need</p>
            <div class="flex mt-2 justify-start">
                <Link :href="route('login')" class="text-md py-2 px-4 text-white font-semibold bg-blue rounded-md hover:bg-indigo-500">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 py-2 px-4 text-md font-semibold rounded-md bg-orange text-white hover:bg-red-100">
                    Register
                </Link>
            </div>
        </div>
    </div>
</template>

<style>
    .bg-linear-gradient {
        background: linear-gradient(120deg, rgb(0, 18, 138), rgb(255, 130, 85) 110%);
    }

    .bg-orange {
        background-color: rgb(255, 130, 85);
    }

    .bg-blue {
        background-color: rgb(0, 10, 115);
    }


</style>

<script>
    import { defineComponent } from 'vue';
    import JetButton from '../Jetstream/Button.vue';
    import JetSecondaryButton from '../Jetstream/Button.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            Link,
            JetButton,
            JetSecondaryButton
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    })
</script>
