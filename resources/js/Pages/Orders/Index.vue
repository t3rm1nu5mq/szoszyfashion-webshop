<template>
    <app-layout title="Rendelések">
        <template #header>
            <ui-grid class="demo-grid">
                <ui-grid-cell class="demo-cell" columns="8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #FEFEFE">
                        Rendelések kezelése
                    </h2>
                </ui-grid-cell>
            </ui-grid>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <empty-state message="rendelések" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import EmptyState from "../../EmptyState";

export default defineComponent({
    components: {
        AppLayout,
        EmptyState
    },
})
</script>

<style scoped>

</style>
