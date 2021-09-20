<template>
<div class="flex flex-col border-r border-b-2 border-indigo-900">
    <div v-for="(d, index) in dailyData" :key="index" class="text-sm bg-indigo-700 px-3 py-4 overflow-hidden">
        <div class="flex items-center">
            <div class="w-1/6 text-lg text-red-300">{{ dayOfWeek(d.dt) }}</div>
            <div class="w-4/6 px-3 flex items-center text-white">
                <div class="rounded-lg bg-white bg-opacity-40 mr-3">
                    <img class="w-12 h-12" :src="icon(d.icon)" alt="''">
                </div>
                <div>{{ capitalize(d.description) }}</div>
            </div>
            <div class="w-1/6 text-right text-white">
                <div class="text-sm">{{ round(d.actual.max) }}</div>
                <div class="text-sm">{{ round(d.actual.min) }}</div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    components: {},
    props: {
        dailyWeather: {
            type: Object,
            default: null
        },
    },
    computed: {
        date() {
            return v => new Date(v * 1000).toLocaleDateString()
        },
        dayOfWeek() {
            return v => {
                const day = new Date(v * 1000).getDay()
                return this.days.at(day)
            }
        },
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
    mounted() {
        this.dailyData = this.dailyWeather.data ?? []
    }, 
    data() {
        return {
            days: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            dailyData: [],
        }
    }
})
</script>
