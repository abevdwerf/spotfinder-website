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
                        <date-selector @value="dateChange"></date-selector>
                    </div>

                    <div class="form__input-wrapper">
                        <label for="finder-begin-time" class="form__label flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"> <path d="M11.375,3.375a8,8,0,1,0,8,8A8,8,0,0,0,11.375,3.375Zm.538,8.692a.54.54,0,0,1-.538.538H7.683a.538.538,0,0,1,0-1.077h3.154V6.452a.538.538,0,0,1,1.077,0Z" transform="translate(-3.375 -3.375)" fill="#666" /> </svg>
                            Time
                        </label>
                        <div class="flex">
                            <time-selector ref="beginTime" @value="timeChange($event, 'begin')" placeholder="Begin time"></time-selector>
                            <time-selector ref="endTime" @value="timeChange($event, 'end')" placeholder="End time" :outer="true" style="margin-left: 2rem;"></time-selector>
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
    import timeSelector from './time-selector.vue';
    import dateSelector from './date-selector.vue';
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
        components: {"date-selector": dateSelector, "time-selector": timeSelector},
        props: ["type", "heading", "submitUrl", "reservateUrl", "getReservationsUrl"],
        methods: {
            finderToggle() {
                if (this.$parent.$el.classList.contains("body--active-finder")) this.$parent.$el.classList.remove("body--active-finder");
                else this.$parent.$el.classList.add("body--active-finder");
            },
            submit() {
                switch (this.type) {
                    case "reservate":
                        // Get search results
                        axios.get(this.submitUrl , { params: this.values })
                        .then((response) => { this.$parent.rooms = response.data; }).catch((error) => console.log(error.message));
                    break;
                
                    default:
                        // Get search results
                        axios.get(this.submitUrl , { params: this.values })
                        .then((response) => this.searchAvailable(response.data, values)).catch((error) => console.log(error.message));
                    break;
                }

                let values = this.values;
                if (values.location !== "") {
                    // Close the finder to show the results
                    if (this.$parent.$el.classList.contains("body--active-finder")) this.finderToggle();    
                    
                    // Remove default page-content
                    const tabs = document.getElementsByClassName("tab__item");
                    let navTabs = document.getElementsByClassName("tab__navigator__item");

                    tabs[0].classList.add("tab__item--hide");
                    tabs[1].classList.remove("tab__item--hide");
                    if (tabs[2]) tabs[2].classList.add("tab__item--hide");

                    for (let index = 0; index < navTabs.length; index++) navTabs[index].classList.remove("tab__navigator__item--active");
                    if (document.getElementsByClassName("tab__navigator__item")[0]) document.getElementsByClassName("tab__navigator__item")[0].classList.add("tab__navigator__item--active");
                    
                } else alert("You can't select a room without providing a location.");
            },
            dateChange(value) {
                this.reservationValues.date = value;
            },
            timeChange(value, type) {
                switch (type) {
                    case "begin":
                        // Check if begintime does not come after endtime
                        if (this.reservationValues.endTime === "" || parseInt(value.split(":")[0]) < parseInt(this.reservationValues.endTime.split(":")[0])) this.reservationValues.beginTime = value;
                        else {
                            if (parseInt(value.split(":")[0]) == parseInt(this.reservationValues.endTime.split(":")[0]) && parseInt(value.split(":")[1]) < parseInt(this.reservationValues.endTime.split(":")[1])) this.reservationValues.beginTime = value;
                            else {
                                this.reservationValues.beginTime = "";
                                alert("You can't set a begintime that is later then the end-time.");
                                document.getElementsByClassName("time-selector__input")[0].value = "";
                            }
                        }
                    break;

                    case "end":
                        // Check if endtime does not come before begintime
                        if (this.reservationValues.beginTime === "" || parseInt(value.split(":")[0]) > parseInt(this.reservationValues.beginTime.split(":")[0])) this.reservationValues.endTime = value;
                        else {
                             if (parseInt(value.split(":")[0]) == parseInt(this.reservationValues.beginTime.split(":")[0]) && parseInt(value.split(":")[1]) > parseInt(this.reservationValues.beginTime.split(":")[1])) this.reservationValues.endTime = value;
                             else {
                                 this.reservationValues.endTime = "";
                                alert("You can't set a endtime that is earlier then the begin-time.");
                                document.getElementsByClassName("time-selector__input")[1].value = "";
                             }
                        }
                    break; 
                }
            },
            searchAvailable(response, values) {
                // Loop trough new rooms
                this.$parent.rooms = response;

                // Set location
                this.$parent.$refs.locationDropdown.$refs.shownInput.value = this.values.locationName;
                var numberChildren = this.$parent.$refs.numberOfPeopleSelector.$refs.wrapper.children;
                for (let index = 0; index < numberChildren.length; index++) if (parseInt(numberChildren[index].dataset.id) === this.values.numberOfPeople) numberChildren[index].click();

                // Gather search history from localstorage
                let historyArray = JSON.parse(window.localStorage.getItem("search-history"));

                // // Set new search history in localstorage
                if (historyArray != null) {
                    historyArray.unshift(values);
                    if (historyArray.length > 4 ) historyArray.length = 4;
                    window.localStorage.setItem("search-history", JSON.stringify(historyArray));
                } else window.localStorage.setItem("search-history", JSON.stringify([values]));
            },
            reservate(roomId) {
                if (this.reservationValues.date == "") alert("You have not selected a date yet")
                else {
                    if (this.reservationValues.beginTime == "" || this.reservationValues.endTime == "") alert("You have not select an end- and/or a begintime of your reservation.");
                    else axios.get(this.getReservationsUrl).then((response) => {
                        let reservateable = true;
                        const wishedBeginHour = parseInt(this.reservationValues.beginTime.split(":")[0]);
                        const wishedBeginMinute = parseInt(this.reservationValues.beginTime.split(":")[1]);

                        const wishedEndHour = parseInt(this.reservationValues.endTime.split(":")[0]);
                        const wishedEndMinute = parseInt(this.reservationValues.endTime.split(":")[1]);

                        for (let index = 0; index < response.data.length; index++) {
                            if (reservateable === true) {
                                const reservationPossibility = response.data[index];
                                
                                if (reservationPossibility.room_id == this.$parent.room.id) {
                                    console.log(this.reservationValues.date, reservationPossibility.reservation_start.split(' ')[0]);
                                    if (this.reservationValues.date == reservationPossibility.reservation_start.split(' ')[0]) {
                                        const plannedBeginHour = parseInt(reservationPossibility.reservation_start.split(' ')[1].split(":")[0]);
                                        const plannedEndHour = parseInt(reservationPossibility.reservation_end.split(' ')[1].split(":")[0]);
                                        const plannedBeginMinute = parseInt(reservationPossibility.reservation_start.split(' ')[1].split(":")[1]);
                                        const plannedEndMinute = parseInt(reservationPossibility.reservation_end.split(' ')[1].split(":")[1]);

                                        // When you want a start or endtime that is between the planned begin or end time
                                        if ((wishedBeginHour > plannedBeginHour && wishedBeginHour < plannedEndHour) || (wishedEndHour > plannedBeginHour && wishedEndHour < plannedEndHour)) {
                                            reservateable = false;
                                            alert("There is already an reservation in this room from: " + reservationPossibility.reservation_start.split(' ')[1] + " until: " + reservationPossibility.reservation_end.split(' ')[1]);
                                        }
                                        // When you want a starttime that is near the end of an existing reservation
                                        else if (wishedBeginHour == plannedEndHour) {
                                            if (wishedBeginMinute < plannedEndMinute) {
                                                reservateable = false;
                                                alert("There is already an reservation in this room from: " + reservationPossibility.reservation_start.split(' ')[1] + " until: " + reservationPossibility.reservation_end.split(' ')[1]);
                                            }
                                        } 
                                        // When you want a endtime that is near the start of an existing reservation
                                        else if (wishedEndHour == plannedBeginHour) {
                                            if (wishedEndMinute > plannedBeginMinute) {
                                                reservateable = false;
                                                alert("There is already an reservation in this room from: " + reservationPossibility.reservation_start.split(' ')[1] + " until: " + reservationPossibility.reservation_end.split(' ')[1]);
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        if (reservateable === true) {
                            let reservationEndTime = this.reservationValues.endTime;
                            let minutes = parseInt(this.reservationValues.endTime.split(":")[1]);
                            if (minutes == 0) parseInt(this.reservationValues.endTime.split(":")[0]) < 10 ? reservationEndTime = "0" + (parseInt(this.reservationValues.endTime.split(":")[0]) - 1) + ":59" : reservationEndTime = parseInt(this.reservationValues.endTime.split(":")[0]) - 1 + ":59";
                            else reservationEndTime = this.reservationValues.endTime.split(":")[0] + ":" + (parseInt(this.reservationValues.endTime.split(":")[1]) - 1);

                            axios.post(this.reservateUrl , {
                                "room_id": roomId,
                                "reservation_start": this.reservationValues.date + " " + this.reservationValues.beginTime + ":00",
                                "reservation_end": this.reservationValues.date + " " + reservationEndTime + ":00"
                            }).then((response) => {
                                alert("Reservated succesfully");

                                // Remove default page-content
                                const tabs = document.getElementsByClassName("tab__item");
                                let navTabs = document.getElementsByClassName("tab__navigator__item");

                                if (tabs[2]) tabs[0].classList.add("tab__item--hide");
                                if (tabs[2]) tabs[1].classList.add("tab__item--hide");
                                if (tabs[2]) tabs[2].classList.remove("tab__item--hide");

                                for (let index = 0; index < navTabs.length; index++) navTabs[index].classList.remove("tab__navigator__item--active");
                                if (document.getElementsByClassName("tab__navigator__item")[1]) document.getElementsByClassName("tab__navigator__item")[1].classList.add("tab__navigator__item--active");
                            }).catch((error) => console.log(error.message));
                        }
                    }).catch((error) => console.error(error.message));
                }
            }
        }
    }
</script>