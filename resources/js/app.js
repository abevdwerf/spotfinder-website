import Vue from 'vue';

// Custom vue components
import Finder from './components/finder.vue';
import Dropdown from './components/dropdown.vue';
import RewriteUrl from './components/rewrite-url.vue';
import canvasGrid from './components/canvas-grid.vue';
import checkButton from './components/check-button.vue';
import finderHistory from './components/finder-history.vue';
import numberSelector from './components/number-selector.vue';
import axios from 'axios';

Vue.component('finder', Finder);
Vue.component('dropdown', Dropdown);
Vue.component('rewrite-url', RewriteUrl);
Vue.component('canvas-grid', canvasGrid);
Vue.component('check-button', checkButton);
Vue.component('finder-history', finderHistory);
Vue.component('number-selector', numberSelector);

// Initialize vue instance
new Vue({
    el: ".app",
    data: {
        room: null,
        rooms: null,
        navigationActive: false
    },
    delimiters: ['[[', ']]'],
    methods: {
        tabChange(e, tab) {
            const navigatorTabs = e.target.parentElement.children;
            for (let index = 0; index < navigatorTabs.length; index++) navigatorTabs[index].classList.remove("tab__navigator__item--active");
            e.target.classList.add("tab__navigator__item--active");

            const tabs = document.getElementsByClassName("tab__item");
            for (let index = 0; index < tabs.length; index++) tabs[index].classList.add("tab__item--hide");
            document.querySelector("[data-" + tab + "]").classList.remove("tab__item--hide");
        },
        navigationToggle() {
            this.navigationActive = !this.navigationActive;
        },
        roomToggle(event, room) {
            this.room = room;
            for (let index = 0; index < event.target.parentElement.children.length; index++) event.target.parentElement.children[index].classList.remove("rooms__item--selected");
            event.target.classList.add("rooms__item--selected");
            document.getElementsByClassName("rooms")[0].classList.add("rooms--searched");
        }
    },
    watch: {
        room(value) {
            this.$nextTick(function () {
                axios.get('getRoomsFromFloor', { params: {
                    floorId: this.room.floor_id
                } })
                .then((response) => this.$refs.canvas.initCanvas(value.grid_location, response.data))
                .catch((error) => { console.error(error.message) });
            });
        }
    }
});