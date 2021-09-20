<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-2xl text-white pt-0 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12 pb-0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col bg-indigo-900 shadow-xl sm:rounded-xl overflow-hidden">
                    <div class="flex flex-col w-full">
                        <current-weather :currentWeather="currentWeather" :location="location" :expectedRain="{rain: expectedRain}"></current-weather>
                        <div class="flex flex-col md:flex-row bg-indigo-700 w-full">
                            <weekly-forecast v-if="dailyWeather.length" class="md:w-1/2" :dailyWeather="{ data: dailyWeather}"></weekly-forecast>
                            <!-- <rain-forecast v-if="loaded" :hourlyWeather="hourlyWeather"></rain-forecast> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import CurrentWeather from './Widgets/CurrentWeather.vue'
    import { usePage } from '@inertiajs/inertia-vue3'
    import WeeklyForecast from './Widgets/WeeklyForecast.vue'
    import RainForecast from './Widgets/RainForecast.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
            CurrentWeather,
            WeeklyForecast,
            RainForecast
        },
        data() {
            const loc = usePage().props.value.location
            return {
                currentWeather: {
                    currentTime: '',
                    actual: '',
                    feelsLike: '',
                    sunrise: '',
                    sunset: '',
                    humidity: '',
                    clouds: '',
                    description: '',
                    icon: '',
                    rain: '',
                },
                minutelyWeather: [],
                hourlyWeather: [],
                dailyWeather: [],
                alerts: '',
                expectedRain: 0,
                loaded: false,
                location: {
                    locationName: `${loc['cityName']}, ${loc['countryCode']}`,
                    lat: loc['lat'],
                    lng: loc['lng']
                }
            }
        },
        mounted,
    })

async function mounted() {
    console.log('HEREEE')
    const weather = usePage().props.value.weather

    const c = weather.current
    this.currentWeather = {
        dt: c.dt ?? new Date(),
        actual: c.temp,
        feelsLike: c.feels_like,
        sunrise: c.sunrise,
        sunset: c.sunset,
        humidity: c.humidity,
        clouds: c.clouds,
        description: c.weather[0].description ?? 'Unavailable',
        icon: c.weather[0].icon,
        rain: c.rain
    }

    const minutely = weather.minutely
    if (minutely && minutely.length) {
        this.minutelyWeather = minutely.map(m => { 
            return { time: m.dt, rain: m.percipitation }
        })
    }

    const hourly = weather.hourly
    if (hourly && hourly.length) {
        this.hourlyWeather = hourly.map((h, idx) => {
            return {
                id: idx,
                dt: h.dt ?? new Date(),
                actual: h.temp,
                feelsLike: h.feels_like,
                sunrise: h.sunrise,
                sunset: h.sunset,
                humidity: h.humidity,
                clouds: h.clouds,
                description: h.weather.description ?? 'Unavailable',
                icon: h.weather[0].icon,
            }
        })
    }

    const daily = weather.daily
    if (daily && daily.length) {
        this.dailyWeather = daily.map((d, idx) => {
            return {
                id: idx,
                dt: d.dt ?? new Date(),
                actual: d.temp,
                feelsLike: d.feels_like,
                sunrise: d.sunrise,
                sunset: d.sunset,
                humidity: d.humidity,
                clouds: d.clouds,
                description: d.weather[0].description ?? 'Unavailable',
                icon: d.weather[0].icon,
                rain: d.rain ?? 0
            }
        })
    }
    let rain = 0
    this.dailyWeather.forEach(d => {
        rain += d.rain
    })

    this.expectedRain = rain

    this.loaded = true

}
</script>
