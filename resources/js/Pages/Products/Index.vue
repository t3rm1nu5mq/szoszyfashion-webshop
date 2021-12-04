<template>
    <app-layout title="Termékek">
        <template #header>
            <ui-grid class="demo-grid">
                <ui-grid-cell class="demo-cell" columns="9">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #FEFEFE" v-if="!createModalOpened">
                        Termékek kezelése
                    </h2>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: #FEFEFE" v-if="createModalOpened">
                        Új termék hozzáadása
                    </h2>
                </ui-grid-cell>
                <ui-grid-cell class="demo-cell" columns="3">
                    <ui-button outlined icon="add" style="color: white; border-color: white" @click="createModalOpened=true" v-if="!createModalOpened">Új termék hozzáadása</ui-button>
                    <ui-button outlined icon="keyboard_backspace" style="color: white; border-color: white" @click="createModalOpened=false" v-if="createModalOpened">Vissza</ui-button>
                </ui-grid-cell>
            </ui-grid>
        </template>

        <div class="py-12" v-if="!createModalOpened">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <empty-state message="termékek" />
                </div>
            </div>
        </div>
        <div class="py-12" v-if="createModalOpened">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-2xl">
                    <create-modal v-if="createModalOpened"></create-modal>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import EmptyState from "../../EmptyState";
import CreateModal from "./CreateModal";

export default defineComponent({
    components: {
        AppLayout,
        EmptyState,
        CreateModal
    },

    data() {
        return {
            isLoading: false,
            createModalOpened: false
        }
    }
})
</script>

<style scoped>

</style>
