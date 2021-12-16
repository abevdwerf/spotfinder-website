<template>
    <div>
        <h3 class="h3">Search history</h3>

        <div class="history flex">
            <a ref="itemTemplate" href="#" class="box history__item" v-for="(history, index) in historyItems" :key="index" v-on:click.prevent="itemClick(history)">
                <span class="history__location">{{ history.locationName }}</span>
                <h4 class="h4">{{ history.numberOfPeople }} persons</h4>
            </a>
        </div>
    </div>
</template>

<script>
    const { default: axios } = require("axios");

    export default {
        data() {
            return {
                historyItems: JSON.parse(window.localStorage.getItem("search-history"))
            }
        },
        methods: {
            itemClick(historyItem) {
                var finder = this.$parent.$refs.finder;
                finder.values = historyItem;
                finder.submit();
            }
        }
    }
</script>