<template>
    <section class="finder">
        <div class="finder__inner">
            <h1 class="h1">{{ heading }}</h1>

            <form class="finder__form form" v-on:submit.prevent="submit">
                <slot></slot>

                <div v-if="type === 'reservate'">
                    <div class="form__input-wrapper">
                        <label for="finder-date" class="form__label flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"> <path d="M24 2v22h-24v-22h3v1c0 1.103.897 2 2 2s2-.897 2-2v-1h10v1c0 1.103.897 2 2 2s2-.897 2-2v-1h3zm-2 6h-20v14h20v-14zm-2-7c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-14 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm6.687 13.482c0-.802-.418-1.429-1.109-1.695.528-.264.836-.807.836-1.503 0-1.346-1.312-2.149-2.581-2.149-1.477 0-2.591.925-2.659 2.763h1.645c-.014-.761.271-1.315 1.025-1.315.449 0 .933.272.933.869 0 .754-.816.862-1.567.797v1.28c1.067 0 1.704.067 1.704.985 0 .724-.548 1.048-1.091 1.048-.822 0-1.159-.614-1.188-1.452h-1.634c-.032 1.892 1.114 2.89 2.842 2.89 1.543 0 2.844-.943 2.844-2.518zm4.313 2.518v-7.718h-1.392c-.173 1.154-.995 1.491-2.171 1.459v1.346h1.852v4.913h1.711z" /> </svg>
                            Date
                        </label>
                        <input id="finder-date" class="form__input form__input--date" type="date" v-model="reservationValues.date">
                    </div>

                    <div class="form__input-wrapper">
                        <label for="finder-begin-time" class="form__label flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"> <path d="M11.375,3.375a8,8,0,1,0,8,8A8,8,0,0,0,11.375,3.375Zm.538,8.692a.54.54,0,0,1-.538.538H7.683a.538.538,0,0,1,0-1.077h3.154V6.452a.538.538,0,0,1,1.077,0Z" transform="translate(-3.375 -3.375)" fill="#666" /> </svg>
                            Time
                        </label>
                        <div class="flex">
                            <input id="finder-begin-time" class="form__input form__input--date" type="time" v-model="reservationValues.beginTime">
                            <input id="finder-begin-end" class="form__input form__input--date" type="time" v-model="reservationValues.endTime">
                        </div>
                    </div>

                    <div class="form__input-wrapper form__input-wrapper--submit">
                        <input type="submit" class="btn btn--thirdiary" value="Search for options">
                    </div>
                </div>
            </form>

            <a class="finder__close" href="#" v-on:click.prevent="finderToggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" /></svg>
            </a>
        </div>

        <a class="finder__collapse" href="#" v-on:click.prevent="finderToggle">
            <div class="finder__collapse-inner">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" /></svg>
            </div>
        </a>
    </section>
</template>

<script>
    const { default: axios } = require("axios");

    export default {
        data() {
            return {
                values: {
                    location: "",
                    locationName: "",
                    numberOfPeople: 0,
                    typeDesk: false,
                    typeSilent: false,
                    typeMeeting: false
                },
                reservationValues: {
                    date: "",
                    beginTime: "",
                    endTime: ""
                }
            }
        },
        props: ["type", "heading", "submitUrl", "reservateUrl"],
        methods: {
            finderToggle() {
                if (this.$parent.$el.classList.contains("body--active-finder")) this.$parent.$el.classList.remove("body--active-finder");
                else this.$parent.$el.classList.add("body--active-finder");
            },
            submit() {
                switch (this.type) {
                    case "reservate":
                        // Get available room reservations
                        
                    break;
                
                    default:
                        // Get search results
                        axios.get(this.submitUrl , { params: this.values })
                        .then((response) => this.searchAvailable(response.data, values)).catch((error) => console.log(error));
                    break;
                }

                let values = this.values;
                if (values.location !== "") {
                    // Close the finder to show the results
                    if (this.$parent.$el.classList.contains("body--active-finder")) this.finderToggle();                 
                    
                }
            },
            searchAvailable(response, values) {
                // Loop trough new rooms
                this.$parent.rooms = response;

                // Set location
                this.$parent.$refs.locationDropdown.$refs.shownInput.value = this.values.locationName;
                var numberChildren = this.$parent.$refs.numberOfPeopleSelector.$refs.wrapper.children;
                for (let index = 0; index < numberChildren.length; index++) if (parseInt(numberChildren[index].dataset.id) === this.values.numberOfPeople) numberChildren[index].click();

                // Remove default page-content
                const tabs = document.getElementsByClassName("tab__item");
                tabs[0].classList.add("tab__item--hide");
                tabs[1].classList.remove("tab__item--hide");

                // Gather search history from localstorage
                let historyArray = JSON.parse(window.localStorage.getItem("search-history"));

                // // Set new search history in localstorage
                if (historyArray != null) {
                    historyArray.unshift(values);
                    if (historyArray.length > 4 ) historyArray.length = 4;
                    window.localStorage.setItem("search-history", JSON.stringify(historyArray));
                } else window.localStorage.setItem("search-history", JSON.stringify([values]));
            },
            searchReservations() {

            },
            reservate(roomId) {
                axios.post(this.reservateUrl , {
                    "room_id": roomId,
                    "reservation_start": this.reservationValues.date + " " + this.reservationValues.beginTime,
                    "reservation_end": this.reservationValues.date + " " + this.reservationValues.endTime
                }).then((response) => {
                    alert("Succesvol gereserveerd");
                }).catch((error) => console.error(error));
            }
        }
    }
</script>