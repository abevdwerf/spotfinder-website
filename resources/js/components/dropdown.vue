<template>
    <div>
        <input ref="shownInput" type="text" class="form__input" placeholder="Select a location" v-on:input="search" v-on:click.prevent="active = !active;">
        <div ref="wrapper" class="form__dropdown" :class="active ? 'form__dropdown--active' : ''">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                active: false,
                options: null
            }
        },
        props: ["value"],
        methods: {
            search(event) {
                // Make dropdown active
                this.active = true;

                let allOptions = this.$refs.wrapper.children;

                // Hide all results that don't match with the search result
                for (var i = 0; i < allOptions.length; i++) {
                    if (allOptions[i].innerHTML.toLowerCase().indexOf(event.target.value.toLowerCase()) > -1) allOptions[i].style.display = "block";
                    else allOptions[i].style.display = "none";
                }
            },
            optionClick(option) {
                // Make this option the selected option
                this.active = false;
                option.target.classList.add("form__dropdown-option--selected");

                // Collect the values (text and id) from this option
                this.$refs.shownInput.value = option.target.innerHTML;
                this.$parent.values[this.value] = parseInt(option.target.dataset.id);
            }
        }
    }
</script>