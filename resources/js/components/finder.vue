<template>
    <section class="finder">
        <div class="finder__inner">
            <h1 class="h1">{{ heading }}</h1>

            <form class="finder__form form" v-on:submit.prevent="submit">
                <slot></slot>
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
                }
            }
        },
        props: ["heading", "submitUrl"],
        methods: {
            finderToggle() {
                if (this.$parent.$el.classList.contains("body--active-finder")) this.$parent.$el.classList.remove("body--active-finder");
                else this.$parent.$el.classList.add("body--active-finder");
            },
            submit() {
                axios.get(this.submitUrl , { params: this.values })
                .then((response) => this.searchHandle(response.data)).catch((error) => console.log(error));
            },
            searchHandle(response) {
                let values = this.values;

                if (values.location !== "") {

                    // Close the finder to show the results
                    this.finderToggle();

                    // Loop trough new rooms
                    this.$parent.rooms = response;
                    
                    // Remove default page-content
                    const firstView = document.getElementsByClassName("dashboard__first-view")[0];
                    if (!firstView.classList.contains("dashboard__first-view--hide")) firstView.classList.add("dashboard__first-view--hide");

                    axios.get("location/" + values.location).then((locationResponse) => {
                        // Gather search history from localstorage
                        let historyArray = JSON.parse(window.localStorage.getItem("search-history"));

                        // Set appropiate locationName
                        values.locationName = locationResponse.data;

                        // // Set new search history in localstorage
                        if (historyArray != null) {
                            historyArray.unshift(values);
                            if (historyArray.length > 4 ) historyArray.length = 4;
                            window.localStorage.setItem("search-history", JSON.stringify(historyArray));
                        } else window.localStorage.setItem("search-history", JSON.stringify([values]));
                    });
                }
            }
        }
    }
</script>