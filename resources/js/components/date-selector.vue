<template>
    <div style="position: relative;">
        <input v-on:click.prevent="toggle" type="text" class="form__input date-picker__input" placeholder="Select a date" ref="input" :value="day != null ? day + ' ' + months[month] + ' ' + year : null" readonly />
        <div class="date-picker" ref="picker">
            <div class="date-picker__selected-date flex">
                <a class="date-picker__arrow" href="#" v-on:click.prevent="prevMonth">&lt;</a>
                <span class="date-picker__month">{{ months[month] + " " + year }}</span>
                <a class="date-picker__arrow" href="#" v-on:click.prevent="nextMonth">&gt;</a>
            </div>

            <div class="date-picker__dates flex" ref="dates">
                <a href="#" class="date-picker__day" v-for="day in daysInMonth" :key="day + 1" v-on:click.prevent="selectDate">{{ day + 1 }}</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                day: null,
                year: null,
                month: null,
                daysInMonth: 30,
                months: [
                    "Januari",
                    "Februari",
                    "March",
                    "April",
                    "May",
                    "Juni",
                    "Juli",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ]
            }
        },
        methods: {
            toggle () {
                this.$refs.picker.classList.toggle("date-picker--active");
            },
            prevMonth () {
                this.month--;
                if (this.month < 0) {
                    this.year--;
                    this.month = 11;
                }
                this.formatDates();
            },
            nextMonth () {
                this.month++;
                if (this.month > 11) {
                    this.year++;
                    this.month = 0;
                }
                this.formatDates();
            },
            formatDates () {
                if (this.year % 4 === 0 && this.month === 1) this.daysInMonth = 26;
            },
            selectDate (e) {
                this.day = parseInt(e.target.innerHTML);
                var children = this.$refs.dates.children;
                for (let index = 0; index < children.length; index++) children[index].classList.remove("date-picker__day--active");
                e.target.classList.toggle("date-picker__day--active");
                this.toggle();
            }
        },
        mounted () {
            // Set current year
            this.year = new Date().getFullYear();

            // Set current month
            this.month = new Date().getMonth();

            this.formatDates();
        }
    }
</script>