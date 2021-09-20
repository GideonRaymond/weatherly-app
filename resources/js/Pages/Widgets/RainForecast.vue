<template>
    <line-chart v-if="dataCollection" class="relative" :chartdata="dataCollection" :options="options"></line-chart>
</template>

<script>
import { defineComponent } from 'vue'
import LineChart from './LineChart.vue'

export default defineComponent({
    components: { LineChart },
    props: {
        hourlyWeather: {
          type: Object,
          default: null
        },
    },
    methods: {
        getHour(value) {
            return new Date(value * 1000).getHours()
        }
    },
    data () {
        return {
            dataCollection: null,
        }
    },
    mounted() {
    },
})
</script>
