<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen bg-linear-gradient sm:items-center sm:pt-0 overflow-hidden">
        <svg class="absolute bottom-0 right-0 w-96 h-96 translate-x-1/2 translate-y-1/2 z-50 visible" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 162.227 162.227" style="enable-background:new 0 0 162.227 162.227" xml:space="preserve"><path style="fill:#ff8255" d="M81.113 48.265v65.697c18.142 0 32.848-14.707 32.848-32.849 0-18.141-14.706-32.848-32.848-32.848z"/><path style="fill:#f4ca19" d="M48.266 81.113c0 18.142 14.706 32.849 32.848 32.849V48.265c-18.142 0-32.848 14.707-32.848 32.848z"/><path transform="rotate(60 51.538 29.885)" style="fill:#f4ca19" d="M29.576 25.945h43.92v7.88h-43.92z"/><path transform="rotate(30 29.887 51.535)" style="fill:#f4ca19" d="M7.924 47.597h43.92v7.88H7.924z"/><path style="fill:#f4ca19" d="M0 77.173h43.921v7.881H0z"/><path transform="rotate(-30 29.88 110.688)" style="fill:#f4ca19" d="M7.925 106.748h43.921v7.881H7.925z"/><path transform="rotate(-60 51.536 132.344)" style="fill:#f4ca19" d="M29.576 128.4h43.92v7.881h-43.92z"/><path transform="rotate(-120 110.687 132.343)" style="fill:#ff8255" d="M88.727 128.4h43.922v7.881H88.727z"/><path transform="rotate(-150 132.342 110.69)" style="fill:#ff8255" d="M110.379 106.75H154.3v7.88h-43.921z"/><path style="fill:#ff8255" d="M118.304 77.174h43.922v7.88h-43.922z"/><path transform="rotate(150 132.342 51.54)" style="fill:#ff8255" d="M110.38 47.597h43.921v7.881H110.38z"/><path transform="rotate(120 110.69 29.885)" style="fill:#ff8255" d="M88.729 25.946h43.922v7.88H88.729z"/><path transform="rotate(75.001 68.646 34.581)" style="fill:#f4ca19" d="M57.665 30.643h21.961v7.879H57.665z"/><path transform="rotate(45.001 47.052 47.052)" style="fill:#f4ca19" d="M36.07 43.11h21.96v7.88H36.07z"/><path transform="rotate(-75.013 34.58 68.642)" style="fill:#f4ca19" d="M30.642 57.665h7.88v21.96h-7.88z"/><path transform="rotate(-105.005 34.58 93.58)" style="fill:#f4ca19" d="M30.643 82.6h7.881v21.96h-7.881z"/><path transform="rotate(45.001 47.052 115.184)" style="fill:#f4ca19" d="M43.11 104.194h7.881v21.961H43.11z"/><path transform="rotate(-164.994 68.649 127.642)" style="fill:#f4ca19" d="M64.706 116.663h7.881v21.961h-7.881z"/><path transform="scale(-1) rotate(75.001 166.35 -121.96)" style="fill:#ff8255" d="M82.602 123.702h21.961v7.882H82.602z"/><path transform="rotate(-134.999 115.175 115.176)" style="fill:#ff8255" d="M104.196 111.235h21.961v7.881h-21.961z"/><path transform="rotate(105.005 127.644 93.576)" style="fill:#ff8255" d="M123.703 82.6h7.881v21.961h-7.881z"/><path transform="rotate(74.995 127.646 68.648)" style="fill:#ff8255" d="M123.704 57.664h7.881v21.961h-7.881z"/><path transform="rotate(-135.008 115.175 47.052)" style="fill:#ff8255" d="M111.236 36.07h7.881v21.96h-7.881z"/><path transform="rotate(14.999 93.59 34.585)" style="fill:#ff8255" d="M89.641 23.601h7.882v21.961h-7.882z"/><path style="fill:#ff8255" d="M81.112 0h3.94v43.92h-3.94z"/><path style="fill:#f4ca19" d="M77.174 0h3.938v43.92h-3.938z"/><path style="fill:#ff8255" d="M81.113 118.305h3.939v43.921h-3.939z"/><path style="fill:#f4ca19" d="m81.113 118.305-3.941-.001v43.922h3.941v-43.921z"/></svg>
        <div class="flex flex-col w-full max-w-max items-center md:items-start justify-center md:mr-24 px-8">
            <div class="md:text-7xl text-6xl font-light text-white mb-4">Weatherly</div>
            <p class="text-xl md:text-2xl text-center text-white font-semibold mb-5">The only weather app you'll ever need</p>
            <div class="flex mt-2 justify-start">
                <Link :href="route('login')" class="text-md py-2 px-4 text-white font-semibold bg-red-300 rounded-md hover:bg-red-100">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 py-2 px-4 text-md font-semibold rounded-md bg-indigo-700 text-white hover:bg-indigo-500">
                    Register
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .bg-linear-gradient {
        background: linear-gradient(120deg, rgb(0, 18, 138), rgb(255, 130, 85) 95%);
    }
</style>>

<script>
    import { defineComponent } from 'vue';
    import JetButton from '../Jetstream/Button.vue';
    import JetSecondaryButton from '../Jetstream/Button.vue';
    import JetAuthenticationCardLogo from '../Jetstream/AuthenticationCardLogo.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            Link,
            JetButton,
            JetSecondaryButton,
            JetAuthenticationCardLogo
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    })
</script>
