<template>
    <div style="position: relative;">
        <input v-on:click.prevent="toggle" type="text" class="form__input time-selector__input" ref="input" :placeholder="placeholder" readonly>
        <div class="time-selector" ref="selector" :style="outer === true ? 'right: 0; left: initial;' : null">
            <span class="time-selector__time">{{ hour != null && minute != null ? 'Time: ' + hour + ':' + minute : 'No time selected' }}</span>
            <div class="time-selector__part">
                <span class="time-selector__label">Hour:</span>
                <div class="time-selector__options flex">
                    <span class="time-selector__option" v-for="time in [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17]" :key="time" v-on:click="select($event, 'hour', time)">{{ time }}:00</span>
                </div>
            </div>
            <div class="time-selector__part">
                <span class="time-selector__label">Minute:</span>
                <div class="time-selector__options flex">
                    <span class="time-selector__option" v-for="time in ['00', '15', '30', '45']" :key="time" v-on:click="select($event, 'minute', time)">{{ time }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                hour: null,
                minute: null
            }
        },
        props: ["placeholder", "outer"],
        methods: {
            toggle () {
                this.$refs.selector.classList.toggle("time-selector--active");
            },
            select (e, type, time) {
                const children = e.target.parentElement.children;
                for (let index = 0; index < children.length; index++) {
                    children[index].classList.remove("time-selector__option--active");
                }
                e.target.classList.add("time-selector__option--active");

                switch (type) {
                    case "hour":
                        this.hour = time
                    break;

                    case "minute":
                        this.minute = time;
                    break;
                }

                if (this.hour != null && this.minute != null) {
                    this.toggle();
                    this.$refs.input.value = this.hour + ":" + this.minute;
                }
            }
        }
    }
</script>