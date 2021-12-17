<template>
    <div v-show="historyItems.length > 0">
        <h3 class="h3">Search history</h3>

        <div class="history flex">
            <a ref="itemTemplate" href="#" class="box history__item" v-for="(history, index) in historyItems" :key="index" v-on:click.prevent="itemClick(history)">
                <span class="history__location">{{ history.locationName }}</span>
                <h4 class="h4">{{ history.numberOfPeople }} persons</h4>
                <hr>
                <div class="history__types flex">
                    <span class="history__type flex" v-if="history.typeDesk">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.256" height="15" viewBox="0 0 9.256 15"> <g transform="translate(-445 -452.5)"> <g transform="translate(423.2 448.2)"> <path d="M22.867,4.3v6.236H21.8v3.151h4.136v1.74l-2.609,3.151.755.624,1.854-2.232V19.3h.985V16.97L28.775,19.2l.755-.624L26.92,15.427v-1.74h4.136V10.536H29.989V4.3Zm.985.985H29v5.252H23.851Zm6.22,7.418H22.785V11.521h7.287Z" /> </g> <rect width="6" height="8" transform="translate(447 453)"  /> <rect width="9" height="2" transform="translate(445 459)"  /> </g> </svg>
                        <span>Desk</span>
                    </span>
                    <span class="history__type flex" v-if="history.typeSilent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14"> <path d="M7.56,4.757,4.432,8H.844A.86.86,0,0,0,0,8.875v5.25A.86.86,0,0,0,.844,15H4.432L7.56,18.243A.841.841,0,0,0,9,17.625V5.376A.841.841,0,0,0,7.56,4.757Zm8.67,6.743,1.6-1.664a.6.6,0,0,0,0-.832l-.8-.832a.553.553,0,0,0-.8,0l-1.6,1.664-1.6-1.664a.553.553,0,0,0-.8,0l-.8.832a.6.6,0,0,0,0,.832l1.6,1.664-1.6,1.664a.6.6,0,0,0,0,.832l.8.832a.553.553,0,0,0,.8,0l1.6-1.664,1.6,1.664a.553.553,0,0,0,.8,0l.8-.832a.6.6,0,0,0,0-.832Z" transform="translate(0 -4.5)" /> </svg>
                        <span class="check-text">silent room</span>
                    </span>
                    <span class="history__type flex" v-if="history.typeMeeting">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14.183" height="17" viewBox="0 0 14.183 17"> <path d="M91.126,8.189a3.962,3.962,0,0,0,2.9-1.2,3.962,3.962,0,0,0,1.2-2.9,3.962,3.962,0,0,0-1.2-2.9,4.094,4.094,0,0,0-5.79,0,3.962,3.962,0,0,0-1.2,2.895,3.962,3.962,0,0,0,1.2,2.9A3.963,3.963,0,0,0,91.126,8.189Zm0,0" transform="translate(-84.142)" /> <path d="M14.149,252.177a10.114,10.114,0,0,0-.138-1.074,8.464,8.464,0,0,0-.264-1.08,5.335,5.335,0,0,0-.444-1.007,3.8,3.8,0,0,0-.67-.872,2.952,2.952,0,0,0-.962-.6,3.324,3.324,0,0,0-1.228-.222,1.246,1.246,0,0,0-.665.282c-.2.13-.433.281-.693.447a3.971,3.971,0,0,1-.9.4,3.483,3.483,0,0,1-2.194,0,3.962,3.962,0,0,1-.9-.4c-.258-.165-.491-.315-.694-.447a1.245,1.245,0,0,0-.665-.282,3.319,3.319,0,0,0-1.228.222,2.949,2.949,0,0,0-.962.6,3.8,3.8,0,0,0-.669.872,5.345,5.345,0,0,0-.444,1.007,8.484,8.484,0,0,0-.264,1.08,10.078,10.078,0,0,0-.138,1.075c-.023.325-.034.663-.034,1a2.823,2.823,0,0,0,.838,2.136A3.018,3.018,0,0,0,3,256.1h8.186a3.017,3.017,0,0,0,2.16-.788,2.821,2.821,0,0,0,.839-2.136c0-.343-.012-.68-.034-1Zm0,0" transform="translate(0 -239.104)" /> </svg>
                        <span class="check-text">meeting room</span>
                    </span>
                </div>
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