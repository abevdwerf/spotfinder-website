import Vue from 'vue';

// Custom vue components
import Finder from './components/finder.vue';
import Dropdown from './components/dropdown.vue';
import canvasGrid from './components/canvas-grid.vue';
import checkButton from './components/check-button.vue';
import finderHistory from './components/finder-history.vue';
import numberSelector from './components/number-selector.vue';

Vue.component('finder', Finder);
Vue.component('dropdown', Dropdown);
Vue.component('canvas-grid', canvasGrid);
Vue.component('check-button', checkButton);
Vue.component('finder-history', finderHistory);
Vue.component('number-selector', numberSelector);

// Initialize vue instance
new Vue({
    el: ".app",
    data: {
        rooms: null,
        room: null,
        navigationActive: false
    },
    delimiters: ['[[', ']]'],
    methods: {
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
            this.$nextTick(() => this.$refs.canvas.initCanvas(value.grid_location));
        }
    }
});