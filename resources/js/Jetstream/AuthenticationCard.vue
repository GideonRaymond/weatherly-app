<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-linear-gradient">
        <div>
            <slot name="logo" />
        </div>
        <div class="w-full sm:max-w-md mt-6 border-linear-gradient overflow-hidden sm:rounded-lg shadow-xl">
        <div class="w-full sm:max-w-md sm:rounded-lg px-6 py-4 bg-white">
            <slot />
        </div>

        </div>
    </div>
</template>

<style scoped>
    .bg-linear-gradient {
        background: linear-gradient(120deg, rgb(0, 18, 138), rgb(255, 130, 85) 140%);
    }

    /* .bg-blue {
        background-color: rgb(0, 10, 115);
    } */

    .border-linear-gradient {
        padding: 2px;
        background: linear-gradient(300deg, rgb(0, 18, 138), rgb(255, 130, 85))
    } 
</style>
