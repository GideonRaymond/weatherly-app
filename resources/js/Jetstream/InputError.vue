<template>
    <div v-show="message">
        <p class="text-sm text-orange-800">
            {{ message }}
        </p>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['message']
    })
</script>
