<template>
    <shop-layout title="Szöszy Fashion webshop">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-2xl">
                    <ui-grid class="product-grid">
                        <ui-grid-cell columns="12" class="main-header" align="middle">
                            <div class="bg">
                                <h1 align="center" style="color: white; font-size: 4vw; font-weight: 400; z-index: 2">ITT AZ ŐSZ
                                <br>
                                    <ui-button raised style="background-color: #3a3a3a; margin-top: 50px">VÁSÁRLÁS</ui-button>
                                </h1>
                            </div>
                        </ui-grid-cell>
                    </ui-grid>
                </div>
            </div>
        </div>
    </shop-layout>
</template>

<script>
import { defineComponent } from 'vue';
import ShopLayout from "../ShopLayout";

export default defineComponent({
    components: {
        ShopLayout
    },

    data() {
        return {
            isLoading: false
        }
    },
    methods: {
        onSelected(selected) {
            this.selected = selected.value;
        }
    },
    mounted() {

    }
})
</script>

<style scoped>
    .main-header {
        height: 475px;
        background-size: cover;
        background-position: center;
        background-image: url('/images/rustic-autumn-wreath_1296x.jpg');
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .bg {
        width: -webkit-fill-available;
        height: -webkit-fill-available;
        z-index: 1;
        background-color: rgba(104, 88, 88, .4);
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
