<template>
    <shop-layout title="Teszt termék">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-2xl">
                    <ui-grid class="product-grid">
                        <ui-grid-cell columns="6">
                            Termékfotó blokk
                            <!--                            <ui-image-list type="masonry" :text-protection="labelsType === 2">-->
                            <!--                                <ui-image-item-->
                            <!--                                    v-for="(item, index) in list"-->
                            <!--                                    :key="index"-->
                            <!--                                    :image="require(`@/assets/photos/${item}.jpg`)"-->
                            <!--                                >-->
                            <!--                                    <ui-image-text v-if="labelsType">-->
                            <!--                                        Text label-->
                            <!--                                        <template #action>-->
                            <!--                                            <ui-icon-button icon="favorite_border"></ui-icon-button>-->
                            <!--                                        </template>-->
                            <!--                                    </ui-image-text>-->
                            <!--                                </ui-image-item>-->
                            <!--                            </ui-image-list>-->
                        </ui-grid-cell>
                        <ui-grid-cell columns="6">
                            <h1 class="product-title">
                                Alkalmi Oldalt Zippes Nadrág
                            </h1>
                            <div class="price-block">
                                <div class="price">{{ price }}</div>
                                <div class="unavailable">
                                    <ui-chip icon="sentiment_very_dissatisfied" class="red600">
                                        ELFOGYOTT
                                    </ui-chip>
                                </div>
                            </div>
                            <ui-select
                                id="full-func-js-select"
                                v-model="selected"
                                :options="options"
                                :disabled="controls.disabled"
                                @selected="onSelected($event)"
                                style="width: 100%"
                            >
                                Méret
                            </ui-select>
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
import EmptyState from "../../EmptyState";

const options = [
    {
        label: '32',
        value: '32'
    },
    {
        label: '34',
        value: '34',
        disabled: true
    },
    {
        label: '36',
        value: '36'
    },
    {
        label: '38',
        value: '38'
    }
];

export default defineComponent({
    components: {
        ShopLayout,
        EmptyState
    },

    data() {
        return {
            isLoading: false,
            createModalOpened: false,
            options,
            selected: '',
            controls: {
                rtl: false,
                customColor: false,
                disabled: false
            },
            price: '7590'
        }
    },
    methods: {
        onSelected(selected) {
            this.selected = selected.value;
        }
    },
    mounted() {
        this.price = new Intl.NumberFormat('hu-HU', { style: 'currency', currency: 'HUF', minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(this.price);
    }
})
</script>

<style scoped>
.product-grid {
    /*border: 1px solid black;*/
    margin-bottom: 50px;
}
.product-title {
    font-size: 1.3em;
    letter-spacing: 0;
    font-weight: 400;
    line-height: 1.2;
    word-wrap: break-word;
}
.price-block {
    height: 120px;
    display: flex;
    flex-flow: row wrap;
    margin-top: 10px;
}
.price {
    font-size: 0.9em;
    padding-right: 20px;
}
.red600 {
    background-color: #ffccbc;
    color: white;
}
</style>
