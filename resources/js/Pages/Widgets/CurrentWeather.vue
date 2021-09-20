<template>
<div class="flex flex-col sm:flex-row px-4 py-3 justify-between w-full">
        <div class="flex items-center justify-between sm:justify-start text-white sm:w-2/3 w-96 sm:w-auto mx-auto sm:mx-0 sm:mr-3">
            <div class="flex items-center">
                <div>
                    <div class="text-5xl w-full text-center font-semibold">{{ round(currentWeather.actual) }}°C</div>
                    <div class="w-full text-center">Feels like {{ round(currentWeather.feelsLike) }}°C</div>
                </div>
                <div class="mx-5">
                    <div class="font-semibold text-red-300">{{ capitalize(currentWeather.description) }}</div>
                    <div>{{ location.locationName }}</div>
                </div>
            </div>
            <div class="rounded-lg bg-white bg-opacity-40">
                <img class="w-16 h-16" :src="icon(currentWeather.icon)" alt="''">
            </div>
        </div>
    <div class="flex items-center justify-between mx-auto sm:mx-0 sm:justify-end w-96 sm:w-auto pt-3 sm:pt-0 sm:w-1/3">
        <div class="flex flex-col items-center justify-center text-white mr-6">
            <div class="text-5xl w-full text-center font-semibold">{{ round(rain) }}cm</div>
            <div class="w-full text-center">of rain this week</div>
        </div>
        <div class="rounded-lg bg-white bg-opacity-40">
            <img class="w-16 h-16" :src="icon('10d')" alt="''">
        </div>
    </div>
</div>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    components: {},
    props: {
        currentWeather: {
            type: Object,
            default: null
        },
        location: {
            type: Object,
            default: null
        },
        expectedRain: {
            type: Object,
            default: null
        }
    },
    computed: {
        round() {
            return v => Math.round(v)
        },
        capitalize() {
            return v => v.charAt(0).toUpperCase() + v.slice(1)
        },
        icon() {
            return v => v ? `http://openweathermap.org/img/wn/${v}@2x.png` : ''
        },
    },
    data() {
        return {
            rain: this.expectedRain.rain ?? 0
        }
    }
})
</script>
