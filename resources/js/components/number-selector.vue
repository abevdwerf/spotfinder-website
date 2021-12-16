<template>
    <div>
        <div ref="wrapper" class="form__input form__custom-scroll flex">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["value"],
        methods: {
            optionClick(option) {
                let allOptions = this.$refs.wrapper.children;

                // Remove all active states from all options
                for (var i = 0; i < allOptions.length; i++) allOptions[i].classList.remove("form__selection-item--active");

                // Gather value from active option
                this.$parent.values[this.value] = parseInt(option.target.innerHTML);

                // Give option active state
                option.target.classList.add("form__selection-item--active");
            }
        }
    }
</script>